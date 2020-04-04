<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'bail|required|unique:pages|max:255',
            'description' => 'required',
            'content' => 'required',
            'layout' => 'required',
        ];
    }
}
