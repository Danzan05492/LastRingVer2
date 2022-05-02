<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Category;
use App\Http\Requests\StoreInfoRequest;
use App\Http\Requests\UpdateInfoRequest;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos=Info::paginate(10);
        return view('admin.infos.index',['infos'=>$infos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('title','id')->all();
        return view('admin.infos.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'thumbnail'=>'nullable|image'
        ]);
        //dd($request->all());
        $data=$request->all();
        //работаем с картинкой
        if ($request->hasFile('thumbnail')){
            $folder=date('Y-m-d');
            //не льёт в папку public!
            $data['thumbnail']=$request->file('thumbnail')->store("images/{$folder}");
        }
        //льём в базу
        $info=Info::create($data);
        //Связь с категориями
        $info->categories()->sync($request->categories);
        return redirect()->route('infos.index')->with('success','Материал добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
        
        return view('admin.infos.edit',['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        return redirect()->route('categories.index')->with('success','Информация сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Info::destroy($id);
        return redirect()->route('infos.index')->with('success','Информация Удалена');
    }
}
