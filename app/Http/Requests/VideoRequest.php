<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'embed_link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Video name is required',
            'name.max' => 'Vide name max character is 50',
            'embed_link.required' => 'Embeded linnk is required',
        ];
    }
}
