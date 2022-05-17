<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class SearchController extends Controller
{
    public function index(Request $request){
        $request->validate([
            's'=>'required',
        ]);
        $s=$request->s;
        $infos=Info::where('title','LIKE',"%{$s}%")->with('categories')->paginate(2);
        return view('infos.search',['posts'=>$infos,"s"=>$s]);
    }
}
