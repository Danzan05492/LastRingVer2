<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Illness;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCondemned;
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
    public static function uploadImage(StoreCondemned $request,$image=null){
        if ($request->hasFile('thumbnail')){            
            if ($image){
                Storage::delete($image);
            }
            $folder=date('Y-m-d');
            return $request->file('thumbnail')->store("/images/{$folder}");
        }
        else if($image){
            return $image;
        }
        return null;
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($condemned) { 
            if ($condemned->thumbnail){
                Storage::delete($condemned->thumbnail);
            }
        });
    }
}
