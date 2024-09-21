<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable=['name','division_id','description'];

    public function division(){
        return $this->belongsTo(division::class,'division_id');
    }
}
