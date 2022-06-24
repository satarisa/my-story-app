<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => ['required'],
            'cover' => ['image'],
            'author' => ['required'],
            'type' => ['required'],
            'link' => ['url', 'nullable']
        ];
    }

    public function messages()
    {
        return [
            'required' => "The :attribute field can't be empty!",
            'type.required' => "Please choose the :attribute!",
            'url' => "URL not valid!",
            'image' => "File type must be an image! (jpg, jpeg, png, bmp, gif, svg, or webp)"
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'title',
            'cover' => 'cover book',
            'author' => 'author',
            'type' => 'book type'
        ];
    }
}
