<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelephonedirectoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo' => ['nullable', 'image', 'max:500'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'mobile_number' => ['nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'landline_number' => ['nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
