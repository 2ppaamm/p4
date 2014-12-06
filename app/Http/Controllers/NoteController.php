<?php namespace App\Http\Controllers;

use App\Course_section;
use App\Course_section_note;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNoteRequest;
use App\Note_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Paste\Pre;

class NoteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Copy/Create a new resource with given id
     *
     * @return Response
     */

    public function list_note_types(){
        $note_list = Cache::rememberforever('note_list', function()
        {
            return Note_type::lists('format','id');
        });
        return $note_list;
    }

    public function duplicate($id)
    {
        // Find the note to be duplicated and then duplicate it
        $note = $this->find($id);
        if (isset($note)) {
            $newnote = new Course_section_note();
            $newnote = $note;
            $newnote->save();
        }
        else return "Error in duplicating notes";
        return "Note successfully created";
    }

    /** The input are:
     *  $note: an array that contains the id of the note to be ordered
     *  $section_id: contains the section_id for the note
     *  $note_order: the sequence within the section of the note
     */

    public function updatePosition($note, $section_id, $note_order) {
        $modifynote = Course_section_note::findOrFail($note['id']);
        $modifynote->course_section_id = $section_id;
        $modifynote->note_order = $note_order;
        $modifynote->save();
    }

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateNoteRequest $request, CourseController $courseController)
	{
        // check if input file is present and give it a path and use the original name
        $assetpath = public_path('storage/notes/');
        $success = TRUE;
        if (null !== Input::file('link') ) {
            $filename = Input::file('link')->getClientOriginalName();
            $success =  Input::file('link')->move($assetpath, $filename);
        }
        else $filename = 'default-cover.jpg'; // use a default image if no file uploaded

        //set privacy of note
        if (isset($request->privacy))
            $privacy = TRUE;
        else
            $privacy = FALSE;

        if ($success) {
            $note = Course_section_note::create([
                'title' => $request->note_title,
                'description' => $request->note_description,
                'course_section_id' => $request->course_section_id,
                'link' => '/storage/notes/' . $filename,
                'user_id' => Auth::user()->id,
                'note_type_id' => $request->note_type,
                'privacy' => $privacy,
            ]);
            if (Request::ajax()) {
                // provide the ajax content
//                $section = new Course_section();
//                $course = $courseController->getCourseInfo();
//                return view('note.sorter', compact('course'));
                return "in ajax just a message for now, later, create a view to show the sorted";
            } // provide the full content
            else {
                return 'make another view for non-ajax';
            }
        }
        else {
            return "Error storing note";
        }
    }

	/**
	 * Find note
	 *
	 * @param  int  $id
	 * @return note
	 */

    public function find($id) {
        //find the note from cache, if not found, find it in database and then cache it
        if (Cache::has('note'.$id))                                                                   // Check if course is cached and then retrieve cached info
        {
            $note = Cache::get('note'.$id);
        }
        else {
            return Course_section_note::findOrFail($id);
            Cache::put('course' . $id, $course, 30);                                                  // Cache if key not already there
        }
        return $note;
    }
	public function show($id)
	{
        $note = $this->find($id);
        if (isset($note))
            return view('note.show', compact('note'));
        else
            return 'Note not found';
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return "Edit notes".$id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        return "Update notes";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        return "Destroy notes";
	}

}
