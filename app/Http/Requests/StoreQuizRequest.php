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
            // 'time_limit' => 'required|numeric', //!removed

            'start_date' => 'nullable|date', //!added
            'end_date' => 'nullable|date|after_or_equal:start_date', //!added

            'score' => 'nullable|numeric',
            'description' => 'required|string',
            'visibility' => 'required|in:public,private,restricted',
            'randomize' => 'sometimes|boolean',
            'has_correct_answers' => 'sometimes|boolean',
            'active' => 'sometimes|boolean',

            // validation for selected users

            'selected_users' => 'nullable|array', //!added
            'selected_users.*' => 'exists:users,id', //!added

            // Validation rules for questions array
            // 'questions' => 'required|array|min:1',
            'questions.*' => 'required|array|min:1',
            'questions.*.content' => 'required|string',
            'questions.*.image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //!added
            'questions.*.video_url' => 'nullable|url', //!added
            'questions.*.type' => 'required|in:multiple_choice,single_choice,feedback,ranking,numeric', //!added
            'questions.*.difficulty' => 'required|in:easy,medium,hard',
            'questions.*.order' => 'nullable|integer',
            'questions.*.required' => 'required|boolean',

            // Validation rules for options array within each question
            'questions.*.options' => 'required|array|min:2',
            'questions.*.options.*.content' => 'required|string|max:255',
            'questions.*.options.*.is_correct' => 'sometimes|boolean', //TODO: maybe gonna be removed later
        ];
    }
}
