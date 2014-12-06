<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Paste\Pre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateCourseRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $redirectAction = 'CourseCodeController@create';

    public function rules()
    {
        return [
            'course_type' =>'required|integer|exists:course_types,id',
            'course_title' =>'required',
            'course_description'=>'required',
            'gender' => 'required',

            'course_type' => 'required|exists:course_types,id'
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