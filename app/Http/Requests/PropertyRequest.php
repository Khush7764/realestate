<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'title' => ['required'],
            'price' => ['required', 'numeric'],
            'floor_area' => ['required'],
            'bedrom' => ['required'],
            'bathroom' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'description' => ['required'],
            'near_by_places' => ['required'],
        ];
    }
}
