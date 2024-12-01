<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerImage extends Model
{
    use HasFactory;

    const IMAGE_DIR = 'images/banner/';

    protected $fillable = [
        'image',
        'header',
        'sub_text'
    ];
}
