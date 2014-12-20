<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Paste\Pre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EditNoteRequest extends Request {

/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
 //   protected $redirect = '/note';

	public function rules()
	{
		return [
            'input-file' => 'required_if:note_type,4 | mimes:pdf',
            'image-file' => 'required_if:note_type,10 | image',
            'url'=>'required_if:note_type,1,3,5'
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