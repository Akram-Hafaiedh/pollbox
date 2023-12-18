<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
{

    protected function getValidatorInstance()
    {
        // Dump and die the request before validation
        dd($this->all());

        return parent::getValidatorInstance();
    }

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
            'title' => 'required|string|max:255',
            'time_limit' => 'required|numeric',
            'score' => 'required|numeric',
            'description' => 'required|string',
            'visibility' => 'required|in:public,private,restricted', // added
            'randomize' => 'required|boolean', // added
            'has_correct_answers' => 'required|boolean', // added
            'active' => 'required|boolean', // addded
            'questions' => 'required|array|min:1',
            'questions.*' => 'required|array|min:1',
            'questions.*.options' => 'required|array|min:1',
            'questions.*.content' => 'required|string', // added
            'questions.*.options.*' => 'required|string|max:255',
        ];
    }
}
