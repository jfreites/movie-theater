<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovie extends FormRequest
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
        // TODO: validar que  la fecha de publicacion sea a futuro, no queremos publicar peliculas en el pasado
        return [
            'title' => 'required|unique:movies|max:255',
            'published_at' => 'required|date|date_format:Y-m-d|after_or_equal:'.now()->format('Y-m-d'),
            'poster' => 'required|mimes:jpeg,bmp,png|between:1, 6000'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.unique'  => 'The title must be unique',
            'published_at.required' => 'A published date is required',
            'published_at.date_format' => 'Invalid format for the date: Y-m-d',
            'poster.required' => 'A cover picture is required',
            'poster.mimes' => 'Invalid format for the poster',
        ];
    }
}
