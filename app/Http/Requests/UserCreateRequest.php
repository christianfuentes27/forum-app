<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'User name',
            'datebirth' => 'User datebirth',
            'email' => 'User email',
            'avatar' => 'User avatar'
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
            'name' => 'required|string|max:50|min:2',
            'datebirth' => 'required|date',
            'email' => 'required|email|max:80|unique:user_forum,email',
            'avatar' => 'required|string|max:200'
        ];
    }
    
    function messages() {
        $required = ':attribute required';
        $string = ':attribute is a string';
        $max = 'Max length of :attribute is :max';
        $min = 'Min length of :attribute is :min';
        
        return [
            'name.required' => $required,
            'name.string' => $string,
            'name.max' => $max,
            'name.min' =>$min,
            
            'datebirth.required' => $required,
            'datebirth.date' => "Field :attribute has to be a date",
            
            'email.required' => $required,
            'email.email' => 'Field :attribute has to be an email',
            'email.max' => $max,
            'email.unique' => 'This email already exists',
            
            'avatar.required' => $required,
            'avatar.string' => $string,
            'avatar.max' => $max
        ];
    }
}
