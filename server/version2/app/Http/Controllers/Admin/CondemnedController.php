<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Condemned;
use App\Models\Illness;
use App\Http\Requests\StoreCondemned;

class CondemnedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prisoners=Condemned::all();
        return view('admin.condemneds.index',['prisoners'=>$prisoners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $illnesses=Illness::pluck('title','id')->all();
        return view('admin.condemneds.create',compact('illnesses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCondemned $request)
    {   
        $data=$request->all();
        $data['thumbnail']=Condemned::uploadImage($request);        
        Condemned::create($data);        
        return redirect()->route('condemneds.index')->with('success','Запись добавлена');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condemned=Condemned::find($id);
        $illnesses=Illness::pluck('title','id')->all();
        return view('admin.condemneds.edit',compact('condemned','illnesses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCondemned $request, $id)
    {        
        $condemned=Condemned::find($id);
        $data=$request->all();        
        $data['thumbnail']=Condemned::uploadImage($request,$condemned->thumbnail);             
        $condemned->update($data);
        return redirect()->route('condemneds.index')->with('success','Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $condemned=Condemned::find($id); 
               
        $condemned->delete();
        return redirect()->route('condemneds.index')->with('success','Запись удалена');
    }
}
