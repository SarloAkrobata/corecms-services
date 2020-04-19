<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
