<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable=['name','division_id','description','district_id'];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
}
