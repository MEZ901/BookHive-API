<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "isbn" => ['required','integer','unique:books'] ,
            "title" => ['required','string'],
            "content" => ['required','string'],
            "status_id" => ['required','exists:statuses,id'],
            "date_publication" => ['required','date'],
            "number_pages" => ['required','integer'],
            "author_id" => ['required','exists:authors,id'],
            "collection_id" => ['required','exists:collections,id'],
            "genre_id" => ['required','exists:genres,id']
        ];
    }
}
