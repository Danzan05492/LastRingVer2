<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Node;
use App\Models\Freedom;
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
     * @return <Point>array
     */
    public static function userPoints(){
        return Point::all();
    }
}
