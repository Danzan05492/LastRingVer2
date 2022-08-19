<?php
/**
 * Класс для массового обновления
  */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Point;
use App\Http\Resources\PointResource;
use App\Models\Node;
use App\Http\Resources\NodeResource;
use App\Models\Freedom;
use App\Http\Resources\FreedomResource;
use App\Models\Condemned;
use App\Http\Resources\CondemnedResource;
class UpdateController extends Controller
{
    /**
     * Метод возвращает объекты обновлённые после полученной даты
     * @param DateTime lastDate - дата/время последнего обновления
     * @return JSONArray - массив с данными
     */
    public function getAll(Request $request,$lastDate)
    {
        $points = Point::userPoints($request->user()->id,$lastDate);
        $points_collection = PointResource::collection($points);
        $nodes = Node::where('updated_at','>',$lastDate)->get();
        $nodes_collection = NodeResource::collection($nodes);
        $freedoms = Freedom::userFreedoms($request->user()->id,$lastDate);
        $freedoms_collection=FreedomResource::collection($freedoms);
        $condemneds = Condemned::where('owner_id',$request->user()->id)->where('updated_at','>',$lastDate)->get();
        $condemneds_collection=CondemnedResource::collection($condemneds);
        $data_arr=array("condemneds"=>$condemneds_collection,"freedoms"=>$freedoms_collection,"points"=>$points_collection);   
        return $data_arr;     
    }
}
