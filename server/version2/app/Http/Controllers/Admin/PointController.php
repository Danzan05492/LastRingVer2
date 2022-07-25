<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePoint;
use App\Models\Freedom;
use App\Models\Point;
use App\Models\Node;

class PointController extends Controller
{
   
    /**
     * Метод получает из GET параметр freedom_id и пытается вывести форму для создания точки
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $freedom=Freedom::find($_GET['freedom_id']);        
        if (is_object($freedom)){            
            $nodes=Node::all();
            $default_status=Point::INPROGRESS;
            return view('admin.points.create',compact('freedom','nodes','default_status'));        
        }
        else{
            return redirect()->route('freedoms.index')->with('success','Такого дела нет');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoint $request)
    {
        $data=$request->all();        
        $point=Point::create($data);                
        return redirect()->route('freedoms.show',['freedom'=>$point->freedom])->with('success','Точка добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $point=Point::find($id);        
        if (is_object($point)){          
            return view('admin.points.show',compact('point'));
        }
        else{
            return redirect()->route('dashboard')->with('warning','Такой точки нет');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $point=Point::find($id);
        $nodes=Node::all();
        return view('admin.points.edit',compact('point','nodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePoint $request, $id)
    {
        $point=Point::find($id);              
        $point->update($request->all());
        return redirect()->route('freedoms.show',['freedom'=>$point->freedom])->with('success','Точка обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $point=Point::find($id);                
        $point->delete();
        return redirect()->route('freedoms.show',['freedom'=>$point->freedom])->with('success','Точка удалена');
    }
}
