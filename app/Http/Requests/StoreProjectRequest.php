<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title'=>'required|max:150',
            'title_en'=>'nullable|max:150',
            'cover_image'=>'nullable|image|max:4096',
            'full_image'=>'nullable|image|max:4096',
            'git'=>'max:200',
            'content'=>'max:1000',
            'content_en'=>'nullable|max:1000',
            'is_featured' => 'nullable|boolean'
        ];
    }
}
