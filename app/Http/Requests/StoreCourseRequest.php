<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'name' => 'required|string|max:255|min:5|unique:courses,name',
            'level' => 'required|string|max:255|min:5',
            'description' => 'required|string|max:255|min:5',
            'c_route' => 'required|string|max:255|min:5',
            'type_id' => 'required|numeric|max:3|min:1',
            'picture' => 'required'
        ];
    }
}
