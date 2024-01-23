<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;

class SubmitQuizRequest extends FormRequest
{

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        dd($this->all());
        // dd($this->all(), $this->rules());

        parent::prepareForValidation();
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return true;

        // Only allow authenticated users to submit the quiz
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    //!  TODO : Recheck again after modification
    public function rules(): array
    {
        $allInput = $this->all();

        // Ensure 'questions' key exists and is an array
        $questions = isset($allInput['questions']) && is_array($allInput['questions'])
            ? $allInput['questions']
            : [];

        $rules = [];

        // dd($questions);
        foreach ($questions as $index => $question) {
            $questionId = "questions.$index";
            $isRequired = $question['required'] == "1";

            switch ($question['type']) {
                case 'single_choice':
                    $rules["$questionId.selected_option"] = $isRequired ? 'required|numeric' : 'nullable|numeric';
                    break;
                case 'likert_scale':
                    $rules["$questionId.scale_value"] = $isRequired ? 'required|integer|between:1,10' : 'nullable|integer|between:1,10';
                    break;
                case 'multiple_choice':
                    $rules["$questionId.selected_options"] = $isRequired ? 'required|array|min:1' : 'nullable|array';
                    $rules["$questionId.selected_options.*"] = 'integer|distinct';
                    break;
                case 'feedback':
                    $rules["$questionId.answer"] = $isRequired ? 'required|string|max:1000' : 'nullable|string|max:1000';
                    break;
                case 'ranking':
                    // Assuming that rankings are submitted as an array of integers
                    // where each integer is the rank of an option.

                    $numberOfOptions = count($question['rankings']);
                    $rules["$questionId.rankings"] = $isRequired ? 'required|array|size:' . $numberOfOptions : 'nullable|array';
                    $rules["$questionId.ranking.*"] = "integer|distinct|min:1|max:$numberOfOptions";
                    break;
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'questions.*.selected_option.required' => 'Please select an option for question :attribute.',
            'questions.*.scale_value.required' => 'Please provide a scale value for question :attribute.',
            'questions.*.scale_value.between' => 'The scale value for question :attribute must be between 1 and 5.',
            'questions.*.selected_options.required' => 'Please select at least one option for question :attribute.',
            'questions.*.answer.required' => 'Please provide an answer for question :attribute.',
            'questions.*.answer.max' => 'Your answer for question :attribute is too long. It must be under 1000 characters.',
            // ...
        ];
    }
}
