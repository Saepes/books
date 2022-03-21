<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|max:150|min:1|string',
            'desription' => 'nullable|max:100|string',
            'author_id' => 'required|min:1|integer',
            'category_id' => 'required|min:1|integer',
            'date_publication' => 'nullable|integer',
            'cover' => 'required|string'
        ];
    }
}
