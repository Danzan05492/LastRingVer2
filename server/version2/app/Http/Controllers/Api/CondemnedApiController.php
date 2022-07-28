<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Condemned;
use App\Http\Resources\CondemnedResource;

class CondemnedApiController extends Controller
{
    public function index()
    {   
        $condemneds = Condemned::all();//!!Заглушка тут нужно брать токен и смотреть id юзера
        return CondemnedResource::collection($condemneds);        
    }
}
