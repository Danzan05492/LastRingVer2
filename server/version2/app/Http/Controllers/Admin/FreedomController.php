<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Freedom;
use App\Models\Condemned;
use App\Models\Point;
use App\Http\Requests\StoreFreedom;
use App\Models\CalendarSettings;
use Illuminate\Support\Facades\Auth;

class FreedomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condemneds=Condemned::where('owner_id',Auth::user()->id)->get()->pluck('id');        
        $freedoms=Freedom::whereIn('condemned_id',$condemneds)->get();        
        return view('admin.freedoms.index',['freedoms'=>$freedoms]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $condemneds=Condemned::where('owner_id',Auth::user()->id)->get();
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
        $freedom=Freedom::find($id);
        $this->authorize('view', $freedom);
        if (is_object($freedom)){
            $condemned=$freedom->condemned;            
            $points=Point::where('freedom_id',$freedom->id)->orderBy('startdate')->orderByDesc('enddate')->get();
            return view('admin.freedoms.show',compact('freedom','condemned','points'));        
        }
        else{
            return redirect()->route('freedoms.index')->with('success','Такого дела нет');
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
        $freedom=Freedom::find($id);
        $this->authorize('update', $freedom); 
        $condemneds=Condemned::where('owner_id',Auth::user()->id)->get();
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
        $this->authorize('update', $freedom);             
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
        $this->authorize('delete', $freedom);               
        $freedom->delete();
        return redirect()->route('freedoms.index')->with('success','Запись удалена');
    }
    /**
     * Метод генерирует календарь для дела
     * 
     * @param int $id - идентификатор дела
     * @return \Illuminate\Http\Response
     */
    public function calendarForm($id){
        $freedom=Freedom::find($id); 
        $this->authorize('view', $freedom);
        if(is_object($freedom)){
            $condemned=$freedom->condemned;
            return view('admin.freedoms.calendar-form',compact('freedom','condemned'));
        }
        else{
            return redirect()->route('freedoms.show')->with('warning','Такого дела нет');
        }
    }
    /**
     * Обрабатывает форму генератора и создаёт календарь
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makeCalendar($id){
        $freedom=Freedom::find($id); 
        $this->authorize('view', $freedom);
        if(is_object($freedom)){
            $cs=CalendarSettings::makeSettings($freedom);
            $points=$cs->points;
            foreach($points as $point){
                $point->save();
            }
            $freedom->status=Freedom::LOCKED;
            $freedom->save();
            return redirect()->route('freedoms.show',['freedom'=>$freedom->id]) ->with('success','Календарь успешно добавлен');            
        }
        else{
            return redirect()->route('freedoms.index')->with('warning','Такого дела нет');
        }
    }
    /**
     * Метод меняет статус календаря
     * @param int
     * @return \Illuminate\Http\Response
     */
    public function calendarChangeStatus($freedom_id,$status){
        $freedom=Freedom::find($freedom_id);
        $this->authorize('view', $freedom); 
        if(is_object($freedom)){
            if (in_array($status,array(Freedom::EDITABLE,Freedom::LOCKED,Freedom::FINISHED))){
                $freedom->status=$status;
                $freedom->save();
            }
            return redirect()->route('freedoms.show',['freedom'=>$freedom->id]) ->with('success','Статус изменён');            
        }
        else{
            return redirect()->route('freedoms.index')->with('warning','Такого дела нет');
        }
    }
}
