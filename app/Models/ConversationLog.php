<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationLog extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','project_id','note','date'];

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
