<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // Directory Constants
    const PROFILE_IMAGE_DIR = 'images/user/profile/';
    const AVATAR_IMAGE_DIR = 'images/user/avatar/';

    const ROLE_MAP = [
        'companyadmin' => 'Admin',
        'orgadmin' => 'Organization',
        'orgmember' => 'Member',
        'user' => 'User'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'unique_ref',
        'role',
        'full_name_slug',
        'address',
        'status',
        'image',
        'avatar_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'mapped_role',
        'full_name'
    ];

    protected function mappedRole(): Attribute
    {
        return Attribute::make(
            get: fn() => User::ROLE_MAP[$this->attributes['role']],
        );
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => ucfirst(strtolower($this->attributes['first_name'])) . ' ' . ucfirst(strtolower($this->attributes['last_name'])),
        );
    }
}
