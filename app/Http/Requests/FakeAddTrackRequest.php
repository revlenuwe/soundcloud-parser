<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FakeAddTrackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required','string'],
            'genre' => ['required','string'],
            'permalink' => ['required','string'],
            'publisher_permalink' => ['required','string'],
            'license' => ['required','string'],
            'stream_url' => ['required','string'],
            'artwork_url' => ['required','string'],
            'duration' => ['required','integer'],
        ];
    }
}
