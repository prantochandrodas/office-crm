<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationLog extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','project_id','note'];

    public function customer(){
        return $this->belongsTo(customer::class,'customer_id');
    }

    public function project(){
        return $this->belongsTo(project::class,'project_id');
    }
}
