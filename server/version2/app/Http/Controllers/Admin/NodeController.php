<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Node;
use App\Http\Requests\StoreNode;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nodes=Node::all();
        $types=Node::getTypes();
        return view('admin.nodes.index',compact('nodes','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Node::getTypes();
        return view('admin.nodes.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNode $request)
    {
        Node::create($request->all());   
        return redirect()->route('nodes.index')->with('success','Узел добавлен');
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
        $node=Node::find($id);      
        $types=Node::getTypes();  
        return view('admin.nodes.edit',compact('node','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNode $request, $id)
    {
        $node=Node::find($id);           
        $node->update($request->all());
        return redirect()->route('nodes.index')->with('success','Узел обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $node=Node::find($id);                
        $node->delete();
        return redirect()->route('nodes.index')->with('success','Узел удалён');
    }
}
