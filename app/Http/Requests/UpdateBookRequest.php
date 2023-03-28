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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "isbn" => ['sometimes','required','integer','unique:books'] ,
            "title" => ['sometimes','required','string'],
            "content" => ['sometimes','required','string'],
            "status_id" => ['sometimes','required','exists:statuses,id'],
            "date_publication" => ['sometimes','required','date'],
            "number_pages" => ['sometimes','required','integer'],
            "author_id" => ['sometimes','required','exists:authors,id'],
            "collection_id" => ['sometimes','required','exists:collections,id'],
            "genre_id" => ['sometimes','required','exists:genres,id']
        ];
    }
}
