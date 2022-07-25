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
            //https://overcoder.net/q/119866/%D0%BA%D0%BE%D0%BD%D0%B2%D0%B5%D1%80%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D1%82%D1%8C-%D0%B4%D0%B0%D1%82%D1%83-php-%D0%B2-%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%82-%D0%B4%D0%B0%D1%82%D1%8B-javascript
            'backgroundColor'=> '#f56954', 
            'borderColor'=>  '#f56954', 
            'url ' => '/admin/points/'.$this->id,
            'allDay'=>true
        ];
    }
}
