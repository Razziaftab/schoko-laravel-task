<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class ContactRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'company' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'files' => 'required',
            'files.*' => 'mimes:pdf,doc,docx|max:5120',
            'message' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'files.*.mimes' => 'Only pdf, doc, docx files are allowed',
            'files.*.max' => 'Sorry! Maximum allowed size for the file is 5MB',
        ];
    }
}
