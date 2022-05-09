<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
* Контроллер для публичной части
*/
class InfoController extends Controller
{
    public function index(){
        return view('infos.index');
    }
    public function show(){
        return view('infos.show');
    }
}
