<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable=['footer_logo','fav_icon','logo','company_website_link','google_map','phone','about_company','address','company_email','company_name'];
}
