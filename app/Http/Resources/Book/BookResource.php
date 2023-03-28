<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $schema = [
            "isbn" => $this->isbn,
            "title" => $this->title,
            "content" => $this->content,
            "status" => $this->status->name,
            "datePublication" => $this->date_publication,
            "numberPages" => $this->number_pages,
            "author" => $this->author_id,
            "collection" => $this->collection->name,
            "genre" => $this->genre->name,
        ];
        $this->deleted_at != null ? $schema += ['deletedAt' => $this->deleted_at] : null;
        return $schema;
    }
}
