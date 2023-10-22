<?php

namespace App\Http\Requests;

class BookDeleteRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['integer'],
        ];
    }
}