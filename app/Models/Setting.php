<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;


    protected $table = 'settings';

    protected $fillable = [
        'website_name',
        'logo',
        'favicon',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];


}
