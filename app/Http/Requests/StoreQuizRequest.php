<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
{

    protected function getValidatorInstance()
    {
        // Dump and die the request before validation
        // dd($this->all());

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
            'description' => 'nullable|string',
            'visibility' => 'required|in:public,private,restricted', // added
            'randomize' => 'sometimes|boolean', // added
            'has_correct_answers' => 'sometimes|boolean', // added
            'active' => 'sometimes|boolean', // addded

            // validation for selected users

            'selected_users' => 'nullable|array', //added
            'selected_users.*' => 'exists:users,id', // added

            // Validation rules for questions array
            // 'questions' => 'required|array|min:1',
            'questions.*' => 'required|array|min:1',
            'questions.*.content' => 'required|string', // added
            'questions.*.type' => 'required|in:multiple_choice,single_choice,open_ended',
            'questions.*.difficulty' => 'required|in:easy,medium,hard',
            'questions.*.order' => 'nullable|integer|min:1',
            'questions.*.required' => 'required|boolean',

            // Validation rules for options array within each question
            'questions.*.options' => 'required|array|min:2',
            'questions.*.options.*.content' => 'required|string|max:255',
            'questions.*.options.*.is_correct' => 'sometimes|boolean', //added
        ];
    }
}
