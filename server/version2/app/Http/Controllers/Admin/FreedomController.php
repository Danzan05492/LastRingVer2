<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Freedom;
use App\Models\Condemned;
use App\Http\Requests\StoreFreedom;

class FreedomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freedoms=Freedom::all();
        return view('admin.freedoms.index',['freedoms'=>$freedoms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $condemneds=Condemned::all();
        return view('admin.freedoms.create',compact('condemneds'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFreedom $request)
    {        
        Freedom::create($request->all());        
        return redirect()->route('freedoms.index')->with('success','Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $freedom=Freedom::find($id);
        $condemneds=Condemned::all();
        return view('admin.freedoms.edit',compact('freedom','condemneds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFreedom $request, $id)
    {
        $freedom=Freedom::find($id);              
        $freedom->update($request->all());
        return redirect()->route('freedoms.index')->with('success','Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $freedom=freedom::find($id);                
        $freedom->delete();
        return redirect()->route('freedoms.index')->with('success','Запись удалена');
    }
}
