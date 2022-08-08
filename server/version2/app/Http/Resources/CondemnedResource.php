<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CondemnedResource extends JsonResource
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
            'condemned_id'=>$this->id,
            'updated_at'=>$this->updated_at,
            'family'=>$this->family,
            'name'=>$this->name,
            'patronymic'=>$this->patronymic,
            'birthday'=>$this->birthday,
            'gender'=>$this->gender,
            'illness_id'=>$this->illness_id,
            'info'=>$this->info,
            'nick'=>$this->nick,
            'owner_id'=>$this->owner_id,
            'thumbnail'=>$this->thumbnail,
        ];
    }
}
