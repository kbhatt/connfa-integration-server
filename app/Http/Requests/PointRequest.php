<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PointRequest extends Request
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
        $validation = [];
        if (in_array($this->method(), ['POST', 'PUT'])) {
            $validation = [
                'name' => 'required',
                'file' => 'mimes:jpeg,bmp,png,gif|max:6000',
                'image' => 'url',
                'detail_url' => 'url',
            ];
        }

        return $validation;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'detail_url.url' => 'Not a valid URL format.',
            'image.url' => 'Not a valid URL format.',
        ];
    }
}
