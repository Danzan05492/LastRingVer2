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
    protected $fillable=['family','name','patronymic','birthday','gender','illness_id','info','nick','thumbnail'];
    public function illness(){
        return $this->belongsTo(Illness::class);
    }
    public function getImage(){
        if (isset($this->thumbnail)){
            return Storage::url($this->thumbnail);
        }
    }
    /**
     * Метод для загрузки изображения, работает на создании и обновлении модели
     */
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
    /**
     * Метод возвращает по дате рождения возраст
     */
    public function getAge(){
        if (is_numeric(strtotime($this->birthday))){
            $birthday_timestamp = strtotime($this->birthday);
            $age = date('Y') - date('Y', $birthday_timestamp);
            if (date('md', $birthday_timestamp) > date('md')) {
                $age--;
            }
            return $age;
        }
        else{
            return "";
        }
    }
    /**
     * Метод возвращает "привычное" отображение даты рождения
     */
    public function getBirthday(){
        if (is_numeric(strtotime($this->birthday))){            
            return date("d.m.Y",strtotime($this->birthday));
        }
        else{
            return "Дата рождения не задана";
        }
    }
    public static function boot() {
        parent::boot();
        //Перед удалением модели удаляем картинку (если она там есть)
        static::deleting(function($condemned) { 
            if ($condemned->thumbnail){
                Storage::delete($condemned->thumbnail);
            }
        });
    }
}
