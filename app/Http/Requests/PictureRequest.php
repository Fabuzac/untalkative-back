<?php

namespace App\Http\Requests;

class PictureRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [            
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'max:250'],            
            'image' => ['required', 'image'],            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'You must specify your title',            
            'description.required' => 'You must specify your description',
            'image.required' => 'You must specify your image',
            'image.image' => 'Your image format is not valid',
        ];
    }
}
