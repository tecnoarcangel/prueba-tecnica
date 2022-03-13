<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginaRequest extends FormRequest
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
            'name' => ['required'],
            'title' => ['required'],
            'route' => ['required','unique:paginas,route'.($this->id ? ",$this->id,id":'')],
            'status' => ['nullable'],
            'layout' => ['nullable'],
            'css' => ['nullable'],
            'body' => ['nullable'],
            'scripts' => ['nullable'],
            'meta_title' => ['nullable'],
            'meta_type' => ['nullable'],
            'meta_image' => ['nullable','image','max:2048'],
            'meta_url' => ['nullable'],
            'meta_description' => ['nullable'],
            'meta_keywords' => ['nullable'],
        ];
    }
}
