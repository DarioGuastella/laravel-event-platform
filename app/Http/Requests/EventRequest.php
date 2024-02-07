<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            "name" => ["required", "min:5", "max:50"],
            "date" => "",
            "available_tickets" => ["required"],
            "tags" => []
        ];
    }
}
// [
//     'tags'         => 'present|array',
//     'tags.*'       => 'filled|max:255|exists:tags,id'
// ]