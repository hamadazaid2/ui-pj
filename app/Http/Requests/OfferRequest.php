<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            // "name_ar" => "required|max:10",
            // "name_en" => "required|max:10",
            // "price" => "required|numeric",
            // "details_ar" => "required",
            // "details_en" => "required",
            // 'photo'=>'required',
        ];
    }

    public function messages()
    {
        return [
            // 'name_ar.required' => __("messages.offerNameRequired"),
            // 'name_en.required' => __("messages.offerNameRequired"),
            // 'price.required' => __("messages.offerPriceRequired"),
            // 'details_ar.required' => __("messages.offerDetailsRequired"),
            // 'details_en.required' => __("messages.offerDetailsRequired"),
            // 'name_ar.unique' => __("messages.offerNameRequired"),
            // 'name_en.unique' => __("messages.offerNameRequired"),
            // "name_ar.max" => __("messages.offerNamemax"),
            // "name_en.max" => __("messages.offerNamemax"),
            // "price.numeric" => __("messages.offerPriceNumeric"),
            // "photo'required" => __('messages.offerPhotoRequired'),
        ];
    }
}
