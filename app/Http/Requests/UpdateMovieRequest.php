<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|min:2|unique:movies,title',
            'director' => 'string|min:2',
            'image_url' => 'url',
            'duration' => 'integer',
            'release_date' => 'date',
            'genre' => 'string|min:2'
        ];
    }
}
