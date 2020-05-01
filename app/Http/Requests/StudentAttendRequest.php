<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAttendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'class_title'       =>'required',
            'class_description' =>'required',
            'course_name'    =>'required',
            'lecturer_name'    =>'required',
            'photo_one'    =>'required',
            'photo_two'    =>'required',
            'photo_three'    =>'required',
            'photo_four'    =>'required'
        ];
    }
}
