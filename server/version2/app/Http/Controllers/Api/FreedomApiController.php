<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Freedom;
use App\Http\Resources\FreedomResource;

class FreedomApiController extends Controller
{
    public function index(Request $request)
    {   
        $freedoms = Freedom::userFreedoms($request->user()->id);
        return FreedomResource::collection($freedoms);
    }
}