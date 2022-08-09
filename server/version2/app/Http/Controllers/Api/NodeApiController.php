<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Node;
use App\Http\Resources\NodeResource;

class NodeApiController extends Controller
{
    public function index(Request $request)
    {           
        $nodes = Node::all();
        return NodeResource::collection($nodes);
    }
}
