<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Point;
use App\Http\Resources\PointResource;

class PointApiController extends Controller
{
    public function index()
    {   
        $points = Point::userPoints(1);//!!Заглушка тут нужно брать токен и смотреть id юзера
        return PointResource::collection($points);        
    }
}
