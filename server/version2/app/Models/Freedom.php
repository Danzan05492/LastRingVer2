<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condemned;
class Freedom extends Model
{
    use HasFactory;
    const EDITABLE=1;
    const LOCKED=2;
    const FINISHED=3;
    protected $fillable=['condemned_id','info','slug','startdate','enddate','status'];
    public function condemned(){
        return $this->belongsTo(Condemned::class);
    }
    /**
     * Метод возвращает можно ли редактировать дело
     * @return bool
     */
    public function canEdit(){
        return $this->status==self::EDITABLE;
    }
    /**
     * Метод возвращает дела принадлежащие пользователю
     * @param int id - идентификатор пользователя. Если не передан то пытается взять текущего пользователя
     * @param DateTime lastDate - дата последнего обновления
     * @return <Freedom>Array
     */
    public static function userFreedoms($user_id="",$lastDate=""){        
        if ($user_id==""){
            $user_id=Auth::user()->id;
        }
        $condemneds=Condemned::where('owner_id',$user_id)->get()->pluck('id');        
        $freedoms=array();
        if (count($condemneds)>0){            
            foreach ($condemneds as $condemned){
                if ($lastDate==""){
                    $cases=Freedom::where([['condemned_id',"=",$condemned]])->get();
                }
                else{
                    $cases=Freedom::where([['condemned_id',"=",$condemned]])->where('updated_at','>',$lastDate)->get();
                }
                foreach($cases as $case){
                    $freedoms[]=$case;
                }
            }            
        }        
        return $freedoms;
    }
}