<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'sexType' => 'required|in:0,1',
            'tel' => 'required|regex:/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/|unique:profile',
            'holidays' => 'required|array',
            'comment' => 'nullable|string',
        ];
    }
}
