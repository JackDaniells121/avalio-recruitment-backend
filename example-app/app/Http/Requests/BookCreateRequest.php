<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:25'],
            'author' => ['string', 'max:50'],
            'description' => ['string', 'max:255'],
            'publication_date' => ['date'],
            'count' => ['integer'],
        ];
    }
}
