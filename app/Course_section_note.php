<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Paste\Pre;

class Course_section_note extends Model {

	protected $fillable = ['title', 'description', 'note_order','course_section_id', 'link', 'user_id', 'note_type_id', 'privacy'];

    public function note_type(){                            //the type of note
        return $this->belongsTo('App\Note_type', 'note_type_id');
    }

    public function course_section(){                              //each note belongs to a section
        return $this->belongsTo('App\Course_section', 'course_section_id');  //if got time, change this to belongsToMany, where one note can be shared across classes
    }

    public function creator(){                              //each note belongs to a user
        return $this->belongsTo('App\User', 'user_id');
    }

    /** Sorts and arrange the sections in the course
     * @params course_id
     */
    public static function arrangeNotes($section_id){
        try {
            $course_section_notes = Course_section_note::where('course_section_id', '=', $section_id)
                ->select('id', 'note_order')->orderBy('note_order', 'asc')
                ->orderBy('updated_at', 'asc')->get();
            foreach ($course_section_notes as $position => $note) {
                $note->note_order = $position;
                $note->save();
            }
        }
        catch (exception $e) {
            return Redirect::back()->with('flash_message', 'Error in arranging notes.');
        }
    }

    /** The input are:
     *  $note: an array that contains the id of the note to be ordered
     *  $section_id: contains the section_id for the note
     *  $note_order: the sequence within the section of the note
     */

    public static function updatePosition($note, $section_id, $note_order) {
        $modifynote = Course_section_note::findOrFail($note['id']);
        $modifynote->course_section_id = $section_id;
        $modifynote->note_order = $note_order;
        $modifynote->save();
    }

    public static function saveNote($request){
        $note = Course_section_note::create([
            'title' => $request->title,
            'description' => $request->description,
            'course_section_id' => $request->course_section_id,
            'link' => $request->link,
            'user_id' => Auth::user()->id,
            'note_type_id' => $request->note_type_id,
            'privacy' => $request->privacy,
        ]);
    }

    public static function getLastNote(){
        return $note = Course_section_note::orderBy('id','desc')->first();
    }

    /** Find note by id and then store it in Cache if not already there
     *  @param note_id
     * @return $note
     */
    public static function findNote($id) {
        //find the note from cache, if not found, find it in database and then cache it
        try {
            if (Cache::has('note'.$id)){
                $note = Cache::get('note' . $id);
            }
            else {
                $note = Course_section_note::whereId($id)->with('note_type')->first();
                Cache::put('note' . $id, $note, 1);                                                  // Cache if key not already there
            }
        }
        catch(exception $e) {
            return Redirect::back()->with('flash_message', 'Cannot find note');
        }
        return $note;
    }


}

