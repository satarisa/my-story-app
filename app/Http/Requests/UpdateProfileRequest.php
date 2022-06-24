<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'user_name' => ['required', 'unique:users,user_name,'.$this->route('profile')], //table,column,except,id
            'name'      => ['required'],
            'email'     => ['required', 'email:rfc,dns'],
            'password'  => ['nullable', 'min:6', 'confirmed'],
            'picture'   => ['image']
        ];
    }

    public function messages()
    {
        return [
            'required'  => "This field can't be empty!",
            'user_name.unique'  => "Username already exist!",
            'email'     => "Email address not valid!",
            'confirmed' => "Password didn't match!",
            'min'      => "Password must be at least 6 characters!",
            'image' => "File type must be an image!"
        ];
    }
}
