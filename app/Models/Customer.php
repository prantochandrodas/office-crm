<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','status','company_name','note','location_id','name','email','phone','designation','address'];
    
    public function projects()
    {
        return $this->hasMany(CustomerProject::class);
    }

    public function demo()
    {
        return $this->belongsToMany(Project::class, 'customer_projects', 'customer_id', 'project_id');
    }
    

    public function location(){
        return $this->belongsTo(Location::class,'location_id');
    }
    
    public function customerProjects()
    {
        return $this->hasMany(CustomerProject::class);
    }
}
