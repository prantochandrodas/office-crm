<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable=['name','description'];

    public function locations()
    {
        return $this->hasMany(Location::class, 'division_id');
    }
}
