<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Freedom;
use Illuminate\Support\Facades\Gate;

class PointApiController extends Controller
{
    /**
     * Метод возвращает в REST список точек для пользователя
     */
    public function index(Request $request)
    {           
        $points = Point::userPoints($request->user()->id);
        return PointResource::collection($points);
    }
    /**
     * Метод получает точку из приложения и обновляет их
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string - строка с результатом
     */
    public function update(Request $request,$id){
        $point=Point::find($id);    
        //ТУТ проверять что мы можем обновлять только свои точки
        $this->authorize('update', $point);            
        $point->update($request->all());        
        return array("status"=>"SUCCESS");    
    }
    /**
     * Метод получает точку из приложения и обновляет их
     * @param  \Illuminate\Http\Request  $request     
     * @return JSON - строка с результатом
     */
    public function insert(Request $request){
        $data=$request->all();  
        $freedom=Freedom::find($data['freedom_id']);  
        $this->authorize('view', $freedom);  
        $point=Point::create($data);         
        return array("status"=>"SUCCESS","server_id"=>$point->id);
    }
    /**
     * Метод получает несколько точек из приложения и обновляет 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string[] -  массив строка с результатом
     */
    public function updateAll(Request $request){
        $result=array();
        foreach ($request->points as $item){
            $point=Point::find($item["id"]);   
            $status="DENIED";
            if (Gate::allows('update',$point)){
                $point->update($item); 
                $status="OK";
            }
            array_push($result,array("id"=>$item["id"],"status"=>$status));                
        }
        return array("data"=>$result);
    }
}