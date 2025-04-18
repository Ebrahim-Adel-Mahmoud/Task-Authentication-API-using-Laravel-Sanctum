<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ];
    }
}
