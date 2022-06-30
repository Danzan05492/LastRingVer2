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
}
