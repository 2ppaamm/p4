<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Paste\Pre;

class SubjectController extends Controller {

    public function __construct (){
        View::share('subject_list', $this->index());
    }
    /**
	 * Display a listing of subjects.
	 *
	 * @return Response
	 */
	public function index()
	{
        $subject_list = Cache::remember('subjects', 30, function()
        {
            return Subject::with('framework')->select('id','description','icon')->get();
        });
        return $subject_list;
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
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
