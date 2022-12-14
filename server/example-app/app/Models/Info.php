<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
class Info extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=['title','content','thumbnail'];
    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public static function uploadImage(Request $request,$imageToDelete=null){
        if ($request->hasFile('thumbnail')){
            if ($imageToDelete){
                Storage::delete($imageToDelete);
            }
            $folder=date('Y-m-d');            
            return $request->file('thumbnail')->store("images/{$folder}");
        }
        return null;
    }
    public function getImage(){
        if(!$this->thumbnail){
            return asset("no-image.jpg");
        }
        return asset($this->thumbnail);
    }
    public function getInfoDate(){
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->format('d F, Y');
    }
    //Scope
    public function scopeLike($query,$s){
        return $query->where('title','LIKE',"%{$s}%");
    }
}
