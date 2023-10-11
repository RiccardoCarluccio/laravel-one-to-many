<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectUpsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
	    if($user->email === "test@test.test") {
		return true;
        }
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
            "title" => "required|max:255",
            "url" => "required",
            "description" => "nullable",
            "type_id" => "nullable|exists:types,id"
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'Title missing',
            'title.max' => 'Title too long',
            'url.required' => 'url missing'
        ];
    }
}