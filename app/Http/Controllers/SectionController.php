<?php namespace App\Http\Controllers;

use App\Course;
use App\Course_section;
use App\Course_section_note;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Paste\Pre;
use Symfony\Component\Security\Core\Tests\Authentication\RememberMe\PersistentTokenTest;

class SectionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct(){
        $this->middleware('auth');
//        $this->middleware('cache');
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
    public function notes_order(){
        $input = Input::all();
        // Update note positions within each section
 //       return Pre::render($input);
        foreach ($input as $section_id => $section_position) {
            $i = 1;
            //update section
            if (is_int($section_id)) {
                $section = Course_section::findorfail($section_id);
                $section->notes_arrangement = $section_position;
                $section->save();

                $notes = json_decode($section_position, true);                   //decode the json value of the positions
                if (count($notes) > 0) {
                    foreach ($notes as $id => $note) {
                        Course_section_note::updatePosition($note, $section_id, $i);          //send to update Position to update the new order of notes
                        $i++;
                        // Level 2 notes
                        if (isset($note['children'])) {
                            foreach ($note['children'] as $child1id => $child1) {
                                Course_section_note::updatePosition($child1, $section_id, $i);
                                $i++;
                                // Level 3 notes
                                if (isset($child1['children'])) {
                                    foreach ($child1['children'] as $child2id => $child2) {
                                        Course_section_note::updatePosition($child2, $section_id, $i);
                                        $i++;
                                        // Level 4 notes
                                        if (isset($child2['children'])) {
                                            foreach ($child2['children'] as $child3id => $child3) {
                                                Course_section_note::updatePosition($child3, $section_id, $i);
                                                $i++;
                                                // Level 5 notes
                                                if (isset($child3['children'])) {
                                                    foreach ($child3['children'] as $child4id => $child4) {
                                                        Course_section_note::updatePosition($child4, $section_id, $i);
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
        }
        Course::updateCache(Input::get('course_id'));
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