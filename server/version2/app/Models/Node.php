<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Node extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable=['title','description','type','default_length','content','slug'];
    /**
     * Константы для типа узла
     */
    const INFORMATION=1;
    const BREAKPOINT=2;
    public static function getTypes()
    {
        return [self::INFORMATION=>"Информация",self::BREAKPOINT=>"Контрольная точка"];
    }
    /**
     * Метод вернёт текстовое описание типа узла
     */
    public function getType(){
        return self::getTypes()[$this->type];
    }
    /**
     * Метод возвращает массив
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
