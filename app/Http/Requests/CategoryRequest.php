<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules = [
            'code' => 'required|min:3|max:255|unique:categories,code',
            'name' => 'required|min:3|max:255',
            'content' => 'required|min:5',
        ];

        if ($this->route()->named('categories.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('category')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'code.required' => 'Поле код обязательно для ввода',
            'name.required' => 'Поле название обязательно для ввода',
            'content.required' => 'Поле описание обязательно для ввода',
            'code.min' => 'Поле код должно содержать не менее :min символов',
            'name.min' => 'Поле название должно содержать не менее :min символов',
            'content.min' => 'Поле описание должно содержать не менее :min символов',
            'code.max' => 'Поле код должно содержать не менее :max символов',
            'name.max' => 'Поле название должно содержать не менее :max символов',
            'code.unique' => 'Поле код должно быть уникальным',
        ];
    }
}
