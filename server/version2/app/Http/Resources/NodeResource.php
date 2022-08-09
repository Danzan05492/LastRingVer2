<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'node_id'=>$this->id,
            'updated_at'=>$this->updated_at,
            'title'=>$this->title,
            'description'=>$this->description,
            'type'=>$this->type,
            'default_length'=>$this->default_length,
            'content'=>$this->content
        ];
    }
}
