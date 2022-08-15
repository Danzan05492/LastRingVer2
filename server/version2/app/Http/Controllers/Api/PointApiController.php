<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Point;
use App\Http\Resources\PointResource;

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
        return "SUCCESS";
    }
    
}