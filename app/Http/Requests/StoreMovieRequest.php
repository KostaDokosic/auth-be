<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => 'required|string|min:2|unique:movies,title',
            'director' => 'required|string|min:2',
            'image_url' => 'required|url',
            'duration' => 'required|integer',
            'release_date' => 'required|date',
            'genre' => 'required|string|min:2'
        ];
    }
}
