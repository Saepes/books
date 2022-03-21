<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => 'max:150|min:1|string',
            'desription' => 'max:100|min:3|string',
            'author_id' => 'min:1|integer',
            'date_publication' => 'nullable|max:4',
            'cover' => 'string'
        ];
    }
}
