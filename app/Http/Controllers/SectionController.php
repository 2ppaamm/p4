<?php namespace App\Http\Controllers;

use App\Course_section;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Paste\Pre;

class SectionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('cache');
    }

	public function index()
	{
		return "I am at no change index!";
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Organizes the notes in the section according to user's draggable results
	 *
	 * @return redirect to course page
	 */
    public function notes_order(NoteController $noteController){
        $input = Input::all();
//        return Pre::render($input);
        $i = 1;
        // Update note positions within each section
        foreach ($input as $section_id => $section_postion){

            //update section
            if (is_int($section_id)) {
                $section = Course_section::findorfail($section_id);
                $section->notes_arrangement = $section_postion;
                $section->save();
            }
            $notes = json_decode($section_postion, true);                   //decode the json value of the positions
            if (count($notes) > 0) {
                foreach ($notes as $id => $note) {
                    $noteController->updatePosition($note, $section_id, $i);          //send to update Position to update the new order of notes
                    $i++;
                    // Level 2 notes
                    if (isset($note['children'])){
                        foreach($note['children'] as $child1id => $child1) {
                            $noteController->updatePosition($child1, $section_id, $i);
                            $i++;
                            // Level 3 notes
                            if (isset($child1['children'])) {
                                foreach ($child1['children'] as $child2id => $child2) {
                                    $noteController->updatePosition($child2, $section_id, $i);
                                    $i++;
                                    // Level 4 notes
                                    if (isset($child2['children'])) {
                                        foreach ($child2['children'] as $child3id => $child3) {
                                            $noteController->updatePosition($child3, $section_id, $i);
                                            $i++;
                                            // Level 5 notes
                                            if (isset($child3['children'])) {
                                                foreach ($child3['children'] as $child4id => $child4) {
                                                    $noteController->updatePosition($child4, $section_id, $i);
                                                    $i++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
//        return 'Wait...';
        return Redirect::back();
    }
	public function store()
    {
        return "I am at store";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return "I am at edit id";
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}