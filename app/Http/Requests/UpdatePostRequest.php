<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{

    public function rules(): array
    {
        return [
           'title' => 'nullable|min:3',
            'content' => 'nullable|min:3',
        ];
    }
}
