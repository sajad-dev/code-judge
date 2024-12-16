<?php

namespace SajadDev\CodeJudge\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "max:250",
            "descriptions" => "",
            "examples" => "array",
            "examples.*.questions" => "required|max:250",
            "examples.*.answer" => "required|max:250"
        ];
    }
}
