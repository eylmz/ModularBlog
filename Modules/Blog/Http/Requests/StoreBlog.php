<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlog extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|max:191",
            "content" => "required",
            "categories" => "required|array|min:1",
            "categories.*" => "required|int|exists:categories,id",
            "tags" => "required|array|min:1",
            "tags.*" => "required|int|exists:tags,id"
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
