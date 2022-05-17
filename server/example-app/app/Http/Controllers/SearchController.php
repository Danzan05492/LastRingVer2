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
        //тут используется Scope (см модель), а можно было писать запрос!
        $infos=Info::like($s)->with('categories')->paginate(2);
        return view('infos.search',['posts'=>$infos,"s"=>$s]);
    }
}
