<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClasePost extends FormRequest
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
            'title' => 'required|min:5|max:500',
            'descripcion' => 'required|min:5',
            'image' => 'required|mimes:jpeg,bmp,png|max:10240',
            'category_id' => 'required',
            'precio' => 'required',
            'hora' => 'required',
            'posted' => 'required',
            'color' => 'required',
            'textcolor' => 'required',
            'start' => 'required',
            'end' => 'required'
        ];
    }
}
