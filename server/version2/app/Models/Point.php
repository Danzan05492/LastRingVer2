<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Node;
use App\Models\Freedom;
use Illuminate\Support\Facades\Auth;
use App\Models\Condemned;

class Point extends Model
{
    use HasFactory;
    protected $fillable=['freedom_id','startdate','enddate','node_id','status','info'];
    /**
     * Статусы
     */
    const COMPLETED=1;//Точка успешно пройдена
    const FAILED=2;//Точка провалена
    const INPROGRESS=3;//Точка ожидает выполнения
    const MISSED=4;//Точка пропущена
    /**
     * Метод возвращает массив статусов
     */
    public static function getStatusArr()
    {
        return [self::COMPLETED=>"Пройдено",self::FAILED=>"Не выполенно",self::INPROGRESS=>"В процессе",self::MISSED=>"Пропущено"];
    }
    /**
     * Метод возвращает связанный узел
     */
    public function node(){
        return $this->belongsTo(Node::class);
    }
    /**
     * Метод возвращает связанное дело
     */
    public function freedom(){
        return $this->belongsTo(Freedom::class);
    }
    /**
     * Метод возвращает тип точки
     */
    public function getStatus(){
        return self::getStatusArr()[$this->status];
    }
    /**
     * Метод возвращает дату в удобном виде
     * @param $date - какую дату брать 
     */
    public function getDate($date="start"){
        if ($date=="start"){
            $result=$this->startdate;
        }
        else{
            $result=$this->enddate;
        }
        return date("d-m-Y",strtotime($result));
    }
    /**
     * Метод возвращает точки принадлежащие пользователю
     * @param int id - идентификатор пользователя. Если не передан то пытается взять текущего пользователя
     * @param DateTime lastDate - дата последнего обновления, по умолчанию пустая
     * @return <Point>array
     */
    public static function userPoints($user_id="",$lastDate=""){
        $result=null;
        if ($user_id==""){
            $user_id=Auth::user()->id;
        }
        $condemneds=Condemned::where('owner_id',$user_id)->get()->pluck('id');        
        if (count($condemneds)>0){
            $freedoms=array();
            foreach ($condemneds as $condemned){
                $cases=Freedom::where([
                    ['condemned_id',"=",$condemned],
                    ['status',"=",Freedom::LOCKED]
                ])->get();
                foreach($cases as $case){
                    $freedoms[]=$case->id;
                }
            }
            if (count($freedoms)>0){
                if ($lastDate==""){
                    $result=Point::whereIn('freedom_id',$freedoms)->get();
                }
                else{
                    $result=Point::whereIn('freedom_id',$freedoms)->where('updated_at','>',$lastDate)->get();
                }                    
            }
        }        
        return $result;
    }
}