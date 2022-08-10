<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FreedomResource extends JsonResource
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
            'freedom_id'=>$this->id,
            'updated_at'=>$this->updated_at,
            'condemned_id'=>$this->condemned_id,
            'info'=>$this->info,
            'slug'=>$this->slug,
            'enddate'=>$this->enddate,
            'status'=>$this->status,
        ];
    }
}
