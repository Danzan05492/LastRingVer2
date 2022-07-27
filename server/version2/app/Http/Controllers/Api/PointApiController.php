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
        
        $points = Point::userPoints();
        return PointResource::collection($points);        
    }
}
