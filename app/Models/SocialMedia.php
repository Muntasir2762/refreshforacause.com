<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SocialMedia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'platform',
        'logo',
        'link',
        'link_type',
        'platform_slug'
    ];
}
