<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=['name','image','description','technoligy','service_category_id'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_projects')
                    ->withPivot('status', 'note')
                    ->withTimestamps();
    }

    public function service(){
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }
}
