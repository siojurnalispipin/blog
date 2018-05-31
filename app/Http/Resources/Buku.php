<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Buku extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'isbn' => $this->isbn,
            'buku' => $this->buku,
            'deskripsi' => $this->deskripsi,
            'author' => $this->author,
            'user_id' => $this->user_id        
        ];
    }
}
