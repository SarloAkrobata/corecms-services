<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:25',
        ];
    }
}
