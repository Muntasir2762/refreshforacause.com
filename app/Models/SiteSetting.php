<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'favicon',
        'logo',
        'fold_logo',
        'address',
        'phone',
        'email',
        'status'
    ];
}
