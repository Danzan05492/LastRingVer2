<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condemned extends Model
{
    use HasFactory;
    protected $fillable=['family','name','patronymic','age','gender','illness_id','info','nick'];
}
