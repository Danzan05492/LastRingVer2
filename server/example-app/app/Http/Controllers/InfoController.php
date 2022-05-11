<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
/**
* Контроллер для публичной части
*/
class InfoController extends Controller
{
    public function index(){
        $posts=Info::paginate(2);

        return view('infos.index',['posts'=>$posts]);
    }
    public function show($slug){
        $info=Info::where('slug',$slug)->firstOrFail();
        $info->views+=1;
        $info->save();
        return view('infos.show',['info'=>$info]);
    }    
}
