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
        // dd($this->all());
        dd($this->all(), $this->rules());

        parent::prepareForValidation();
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
        $rules =[
            'reponses' => 'required|array',
            'questions' => 'required|array',
        ];

        $questionsIput = $this->input('questions',[]);
        foreach ($questionsIput as $id => $questionData) {
            $question = json_decode($questionData, true);
            $numberOfOptions = count($question->options);
            $type = $question['type'];
            $isRequired = $question['required'];
            $fieldRule = $isRequired ? 'required' : 'nullable';

            // TODO : Add required to required to all fields (depending on the question )
            switch ($type) {
                case 'single_choice':
                    $rules['responses.' . $id] = $fieldRule . '|in:true,false';
                    break;
                case 'feedback':
                    $rules['responses.' . $id] = $fieldRule . '|string';
                    break;
                case 'numeric':
                    $rules['responses.' . $id] = $fieldRule . '|array';
                    $rules['responses.' . $id . '.*.ranking'] = "required|integer|between:1,{$numberOfOptions}";
                    break;
                case 'ranking':
                    $rules['responses.' . $id] = $fieldRule . '|array';
                    $rules['responses.'.$id.'.*'] = $fieldRule  . '|between:1,10';
                    break;
                case 'multiple_choice':
                    // Assuming you have a way to get options for multiple_choice questions
                    $optionIds = Question::with('options')->findOrFail($id)->options->pluck('id')->all();
                    $rules['responses.' . $id] = $fieldRule . '|array';
                    $rules['responses.' . $id . '.*'] = ($fieldRule ? 'required' : 'nullable') . '|in:' . implode(',', $optionIds);
                    break;
            }
        }
        return $rules;
    }
}
