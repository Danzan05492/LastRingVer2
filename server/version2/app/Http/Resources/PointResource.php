<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PointResource extends JsonResource
{
    /**
     * Метод формирует апгрейднутую точку для календаря и не только
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $condemned=$this->freedom->condemned;
        return [
            'point_id'=>$this->id,
            'freedom_id'=>$this->freedom->id,
            'node_id'=>$this->node->id,
            'status'=>$this->status,
            'note_title'=>$this->node->title."(".$condemned->family.")",
            //Данные для календаря
            'title'=>$this->node->title,
            'start'=>date('D M d Y H:i:s O', strtotime($this->startdate)),                        
            'backgroundColor'=> '#f56954', 
            'borderColor'=>  '#f56954', 
            'url' => '/admin/points/'.$this->id,
            'allDay'=>true
        ];
    }
}
