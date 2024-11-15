<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SiteSetting extends Model
{
    use HasFactory, SoftDeletes;

    // Directory Constants
    const FAVICON_DIR = 'images/site/favicon/';
    const LOGO_DIR = 'images/site/logo/';
    const FOLD_LOGO_DIR = 'images/site/fold-logo/';

    protected $guarded = [];

    protected $fillable = [
        'favicon_dir',
        'favicon_file_name',
        'logo_dir',
        'logo_file_name',
        'fold_logo_dir',
        'fold_logo_file_name',
        'address',
        'phone',
        'email',
        'status'
    ];

    protected $hidden = ['favicon_dir', 'logo_dir', 'fold_logo_dir'];

    protected $appends = [
        'favicon_full_path',
        'logo_full_path',
        'fold_logo_full_path'
    ];

    protected function faviconFullPath(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['favicon_dir'] . $this->attributes['favicon_file_name'],
        );
    }

    protected function logoFullPath(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['logo_dir'] . $this->attributes['logo_file_name'],
        );
    }

    protected function foldLogoFullPath(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['fold_logo_dir'] . $this->attributes['fold_logo_file_name'],
        );
    }
}
