<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Illness;
use App\Http\Requests\StoreIllness;
class IllnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $illnesses=Illness::all();
        return view('admin.illnesses.index',['illnesses'=>$illnesses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.illnesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIllness $request)
    {
        Illness::create($request->all());        
        return redirect()->route('illnesses.index')->with('success','Болезнь добавлена');
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $illness=Illness::find($id);
        return view('admin.illnesses.edit',compact('illness'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreIllness $request, $id)
    {
        $illness=Illness::find($id);
        $illness->update($request->all());
        return redirect()->route('illnesses.index')->with('success','Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $illness=Illness::find($id);
        $illness->delete();
        return redirect()->route('illnesses.index')->with('success','Запись удалена');
    }
}
