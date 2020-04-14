<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'publish_date' => 'required|date|before:yesterday',
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.name_required'),
            'name.max' => trans('validation.name_max'),
            'author.required' => trans('validation.author_required'),
            'author.max' => trans('validation.author_max'),
            'publish_date.required' => trans('validation.publish_date_required'),
            'publish_date.date' => trans('validation.publish_date_date'),
            'publish_date.before' => trans('validation.publish_date_before'),
            'title.required' => trans('validation.title_required'),
            'title.max' => trans('validation.title_max'),
            'image.required' => trans('validation.image_required'),
            'image.image' => trans('validation.image_image'),
            'image.max' => trans('validation.image_max'),
            'category_id.required' => trans('validation.category_required'),
        ];
    }
}
