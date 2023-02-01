<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CustomApiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lang'  => 'required|max:2|in:en,hr,fr',
            'per_page'    => 'nullable|integer|min:1',
            'page'        => 'nullable|integer|min:1',
            'category'    => 'nullable|string',
            'tags'        => 'string',
            'with'        => 'string',
            'diff_time'   => 'integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'lang.required' => 'The language field is required e.g lang=en, lang=hr or lang=fr',
            'lang.max' => 'The language field must not be longer than 2 characters.',
            'lang.in' => 'The language field must be one of the following values: en, hr, fr.',
            'tags.string'=> 'The tags must be a string of integers or a single integer.',
            'with.string' => 'The with field must be a string, e.g with=category,tags,ingredients or any of the combinations of those 3 words'
        ];
    }

    /**
     * Return the error messages for the defined validation rules and prints them in JSON.
     *
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
