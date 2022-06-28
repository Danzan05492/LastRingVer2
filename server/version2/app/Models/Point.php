<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $fillable=['freedom_id','owner_id','startdate','enddate','node_id','status','info'];
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
}
