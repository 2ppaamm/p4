<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Paste\Pre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateNoteRequest extends Request {

/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
    protected $redirectAction = 'NoteController@create';

	public function rules()
	{
		return [
			'note_type' =>'required|integer|exists:note_types,id',
            'note_title' =>'required',
            'note_description'=>'required',
            'course_section_id' => 'required|exists:course_sections,id'
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}