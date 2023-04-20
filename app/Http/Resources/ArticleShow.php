<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ArticleShow extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'author' => $this->owner,
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => $this->created->format("d M Y"),
            'updated_at' => $this->updated->format("d M Y"),
            'komentar' => $this->comments,
        ];
    }
}
