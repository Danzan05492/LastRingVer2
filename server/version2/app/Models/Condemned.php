<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Illness;
class Condemned extends Model
{
    use HasFactory;
    protected $fillable=['family','name','patronymic','age','gender','illness_id','info','nick'];
    public function illness(){
        return $this->belongsTo(Illness::class);
    }
}
