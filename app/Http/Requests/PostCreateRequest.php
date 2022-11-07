<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
    
    function attributes() {
        return [
            'title' => 'Post title',
            'message' => 'Post message'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:50|min:1',
            'message' => 'required|string|max:100|min:5'
        ];
    }
    
    function messages() {
        $required = 'Field :attribute required';
        $string = 'Field :attribute is a string';
        $max = 'Max length of :attribute is :max';
        $min = 'Min length of :attribute is :min';
        
        return [
            'title.required' => $required,
            'title.string' => $string,
            'title.max' => $max,
            'title.min' =>$min,
            
            'message.required' => $required,
            'message.string' => $string,
            'message.max' => $max,
            'message.min' =>$min
        ];
    }
}
