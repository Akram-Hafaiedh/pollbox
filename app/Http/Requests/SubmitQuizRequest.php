<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitQuizRequest extends FormRequest
{

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // dd($this->all());

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
        return [
            'reponses' => 'required|array',
        ];

        $responses = $this->input('responses');

        foreach ($responses as $question => $response) {
            $questionType = $question->type;
            switch ($questionType) {
                case 'single_choice':
                    $rules['responses.' . $question] = 'sometimes|in:true,false';
                    break;
                case 'feedback':
                    $rules['responses.' . $question] = 'nullable|string';
                    break;
                case 'number':
                    $rules['responses.' . $question] = 'nullable|numeric';
                    break;
                case 'ranking':
                    $rules['responses.' . $question] = 'nullable|array';
                    foreach ($response as $option => $rank) {
                        $rules['responses.' . $question . '.' . $option] = 'nullable|numeric|min:1|max:10';
                    }
                    break;
                case 'multiple_choice':
                    $rules['responses.' . $question] = 'nullable|array';
                    $rules['responses.' . $question . '.*'] = 'nullable|in:' . implode(',', $question->options->pluck('id')->toArray());
                    break;
            }
        }
    }
}
