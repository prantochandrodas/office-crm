<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'project_id',
        'status',
        'note'
    ];

    // public function project()
    // {
    //     return $this->belongsTo(Project::class, 'project_id');
    // }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
