<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function rules(Request $request)
    {
        return [
            'name' => 'required|string',
            'sexType' => 'required|in:0,1',
            'tel' => 'required|regex:/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/|'.Rule::unique('profile')->ignore($request->profileId),
            'holidays' => 'required|array',
            'comment' => 'nullable|string',
        ];
    }
}
