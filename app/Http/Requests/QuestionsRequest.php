<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required|max:3000',
            'image' => 'required|max:1000',
            'video' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'შევსება აუცილებელია',
            'description.required' => 'შევსება აუცილებელია',
            'image.required' => 'შევსება აუცილებელია',
            'video.required' => 'შევსება აუცილებელია',
        ];
    }
}
