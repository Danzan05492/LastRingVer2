<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condemned;
class Freedom extends Model
{
    use HasFactory;
    protected $fillable=['condemned_id','info','slug','enddate'];
    public function condemned(){
        return $this->belongsTo(Condemned::class);
    }
}
