<?php

namespace SajadDev\CodeJudge\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArbitrationStoreRequest extends FormRequest
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
            "questions_id"=> "required|exists:questions,id",
            "input"=>"required|array",
            "input.*.*"=>"required",
            "output" => "required|array",
            "output.*.*" => "required",
            "time" => "required|integer|max:1000000|min:1"
        ];
    }
}
