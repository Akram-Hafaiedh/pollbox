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

    // TODO : make the admin only can do this with roles
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
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'language' => 'required|string',
            'description' => 'required|string',
            'visibility' => 'required|in:public,private,restricted',
            'bg_color'=>'required|hex_color|string',
            'text_color'=>'required|hex_color|string',
            'selected_users' => 'nullable|array',
            'selected_users.*' => 'exists:users,id',
            'questions.*' => 'required|array|min:1',
            'questions.*.content' => 'required|string',
            'questions.*.image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'questions.*.video_url' => 'nullable|url',
            'questions.*.type' => 'required|in:multiple_choice,single_choice,feedback,ranking,likert_scale',
            'questions.*.order' => 'nullable|integer',
            'questions.*.required' => 'required|boolean',
            'questions.*.options' => 'sometimes|array|min:2',
            'questions.*.options.*.content' => 'required|string|max:255',
            'questions.*.options.*.is_correct' => 'sometimes|boolean', //* maybe gonna be removed later
        ];
    }
}
