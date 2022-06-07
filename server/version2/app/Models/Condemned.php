<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Illness;
use Illuminate\Support\Facades\Storage;
class Condemned extends Model
{
    use HasFactory;
    protected $fillable=['family','name','patronymic','age','gender','illness_id','info','nick','thumbnail'];
    public function illness(){
        return $this->belongsTo(Illness::class);
    }
    public function getImage(){
        if (isset($this->thumbnail)){
            return Storage::url($this->thumbnail);
        }
    }
}
