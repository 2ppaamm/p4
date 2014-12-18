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
//    protected $redirectAction = 'NoteController@create';

	public function rules()
	{
		return [
			'note_type_id' =>'required|integer|exists:note_types,id',
            'title' =>'required',
            'description'=>'required',
            'course_section_id' => 'exists:course_sections,id',
            'input-file' => 'required_if:note_type_id,4 | mimes:pdf',
            'image-file' => 'required_if:note_type_id,10 | image',
            'url'=>'required_if:note_type_id,1,3,5'
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