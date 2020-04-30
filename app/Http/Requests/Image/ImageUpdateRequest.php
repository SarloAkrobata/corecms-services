<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class ImageUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'alt_tag' => 'required|string|min:3',
        ];
    }
}
