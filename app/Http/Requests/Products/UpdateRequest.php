<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'required|max:255',
            'description' => 'required',
            'price'       => 'required|integer',
            'photo'       => 'sometimes|nullable|file|max:2048',
            'address'     => 'required|max:255',
            'state'       => 'required|max:255',
            'city'        => 'required|max:255',
            'zip'         => 'required|max:255',
            'country'     => 'required|in:' . countries()->map->name->join(','),
        ];
    }

    public function messages()
    {
        return [
            'photo.max' => 'The photo may not be greater than 2 MB.'
        ];
    }
}
