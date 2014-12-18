<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EnrollmentRequest extends Request {

    protected $redirectAction = 'CourseCodeController@create';

	public function rules()
	{
		return [
            'course_id' =>'required|integer|exists:courses,id',
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
