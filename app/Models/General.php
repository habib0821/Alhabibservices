<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $table = "general";

    protected $fillable = [
        'website_name',
        'logo',
        'favicon',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

}
