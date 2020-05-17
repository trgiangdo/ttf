<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StoreExamRequest extends FormRequest
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
            'exam_name' => 'required|unique:exams,name',
            'exam_type' => 'required',
            'part1_example_image' => 'required|image',
            'part1_audio' => 'required',
            'part2_audio' => 'required',
            'part3_audio' => 'required',
            'part4_audio' => 'required',
            'part5_paragraph' => 'required',
            'part6_paragraph' => 'required',
            'part7_paragraph' => 'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         //
    //     ];
    // }
}
