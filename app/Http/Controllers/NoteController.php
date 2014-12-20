<?php namespace App\Http\Controllers;

use App\Course;
use App\Course_section;
use App\Course_section_note;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNoteRequest;
use App\Http\Requests\EditNoteRequest;
use App\Note_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Paste\Pre;

class NoteController extends Controller {

    protected $user;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('navbar');
        // Caching pages enable only for production
        //$this->middleware('cache');
    }
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

    public function duplicate($id)
    {
        // Find the note to be duplicated and then duplicate it
//        return "Hello duplicate ".$id;
        $oldnote = Course_section_note::findNote($id);
        // Duplicate a new note
        Course_section_note::saveNote($oldnote);
        Course_section_note::arrangeNotes($oldnote->course_section_id);
        $note = Course_section_note::getLastNote();
        //  Update Cache after a new note is duplicated
        $section= Course_section::findOrFail($note->course_section_id);
        Course_section::arrangeSections($section->course_id);
        $course = Course::updateCache($section->course_id);
        return Redirect::back()->with('flash_message', "Note Duplicated.");
    }

    /**
	 * Store a newly created resource in storage.
	 * @params $request - input after validation
	 * @return Response
     * 1. Check if there is a file or link
     * 2. If there's a file, upload and store
     * 3. If there's a link, save
     * 4. Save note
     * 5. Update Cache
     * 6. Redirect to view
	 */
    public function store(CreateNoteRequest $request)
    {
        // 1. Check for input file and give it a path and use the original name
        $storage_path = '/storage/notes/';
        $assetpath = public_path($storage_path);
        $success = TRUE;

        //2. Save the input file
        $file = Input::file('input-file');
        $image = Input::file('image-file');
        if (null !== $file) {
            $filename = $file->getClientOriginalName();
            $success = $file->move($assetpath, $filename);
            $filename = $storage_path . $filename;
        } elseif (null !== $image) {
            $filename = $image->getClientOriginalName();
            $success = $image->move($assetpath, $filename);
            $filename = $storage_path . $filename;
        } elseif (null !== $request->url) {
            $filename = $request->url;
            // Handling youtube videos
            if (strpos($filename, 'youtube') !== false)
                $filename = preg_replace('/^https:\/\/www.youtube.com\/watch?\?v=/', '//www.youtube.com/embed/', $filename);// reformat youtube video

            // Handling reveal.js slides
            elseif (strpos($filename, 'reveal') !== false) {
                $filename = preg_replace('/^http:/', '', $filename);// reformat slides token
                $index = strpos($filename, 'p?token');
                $replace_text = 'p/embed?token';
                $filename = substr_replace($filename, $replace_text, $index, strlen($replace_text));
            }
        } else $filename = $storage_path . 'default-cover.jpg'; // use a default image if no file uploaded
        // 3. Check for url link
        //set privacy of note
        if (isset($request->privacy))
            $privacy = TRUE;
        else
            $privacy = FALSE;

        $request->link = $filename;
        $request->privacy = $privacy;
        // 4. Save the note
        if ($success) {
            Course_section_note::saveNote($request);

            //5.  Update Cache after a new note is added
            $section= Course_section::findOrFail($request->course_section_id);
            Course_section::arrangeSections($section->course_id);
            $course = Course::updateCache($section->course_id);
            $message = "Your new note is created and placed at the end of the section.";

            if (Request::ajax()) {
                return 'message from ajax';
            } // provide the full content
            else {
  //              return Redirect::action('CourseController@getShow($course->id)');
                return Redirect::back()->with('flash_message',$message);
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

	public function show($id) {
        $note = Course_section_note::findNote($id);
        return view('note.show', compact('note'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $note = Course_section_note::findNote($id);
        $note_types = Note_type::list_note_types();
        return view('note.edit', compact('note', 'note_types'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
       // 1. Check for input file and give it a path and use the original name

        $note = Course_section_note::with('note_type')->where('id', '=', $id)->first();
        $storage_path = '/storage/notes/';
        $assetpath = public_path($storage_path);
        $success = TRUE;
        $request = Input::all();
        //2. Save the input file if there is a file
        if (isset($request['link'])) {
            $filename = $request['link'];
            if ($note->note_type->format == 'File' || $note->note_type->format == 'Image'){
                $file = Input::file('link');
                if (null !== $file) {
                    $filename = $file->getClientOriginalName();
                    $success = $file->move($assetpath, $filename);
                    $filename = $storage_path . $filename;
                }
            }
            else { //if not a file
                // Handling youtube videos
                if (strpos($filename, 'youtube') !== false){
                    $filename = preg_replace('/^https:\/\/www.youtube.com\/watch?\?v=/', '//www.youtube.com/embed/', $filename);// reformat youtube video
                }
                // Handling reveal.js slides
                elseif (strpos($filename, 'reveal') !== false) {
                    $filename = preg_replace('/^http:/', '', $filename);// reformat slides token
                    $index = strpos($filename, 'p?token');
                    $replace_text = 'p/embed?token';
                    $filename = substr_replace($filename, $replace_text, $index, strlen($replace_text));
                }
            }
        }
        else $filename = $storage_path . 'default-cover.jpg'; // use a default image if no file uploaded
        if (isset($filename)){
            $note->link = $filename;
        }
        $note->user_id = Auth::user()->id;
 //       echo Pre::render($note->description);
        $note->title = $request['title'];
        $note->description = $request['description'];
   //     return Pre::render($note->description);
        $note->save();
        $section= Course_section::findOrFail($note->course_section_id);
        Course_section::arrangeSections($section->course_id);
        $course = Course::updateCache($section->course_id);
        if (Request::ajax()) {
            return 'Note Saved';
        }
        else {
            return Redirect::back()->with('flash_message', 'Note Saved.');
        }
 	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $note = Course_section_note::findOrFail($id);
        $note->delete();

        // rearrange remaining notes and save it in cache
        $section= Course_section::findOrFail($note->course_section_id);
        Course_section::arrangeSections($section->course_id);
        $course = Course::updateCache($section->course_id);
        return Redirect::back()->with('flash_message', 'Note deleted.');
	}
}