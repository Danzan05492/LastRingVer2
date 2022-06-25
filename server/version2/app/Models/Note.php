<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable=['title','description','type','default_length','content'];
    /**
     * Константы для типа узла
     */
    const INFORMATION=1;
    const BREAKPOINT=2;
    public static function getConstants()
    {
        return [self::INFORMATION,self::BREAKPOINT];
    }
}
