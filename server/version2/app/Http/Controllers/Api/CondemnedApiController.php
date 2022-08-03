<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Condemned;
use App\Http\Resources\CondemnedResource;

class CondemnedApiController extends Controller
{
    public function index(Request $request)
    {           
        $condemneds = Condemned::where('owner_id',$request->user()->id)->get();
        return CondemnedResource::collection($condemneds);
    }
}
