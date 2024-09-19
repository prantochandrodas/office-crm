<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=['name','image','description'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_projects')
                    ->withPivot('status', 'note')
                    ->withTimestamps();
    }
}
