<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
}
