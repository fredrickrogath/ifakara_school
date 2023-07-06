<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
        'school_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    /**
     * User mode lralationships.
     *
     */

    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class, 'user_id');
    }

    public function school()
{
    return $this->belongsTo(\App\Models\School::class);
}


    public function getRole($id)
    {
        if($id == \App\Models\User::is_head)
        return 'head';
        elseif($id == \App\Models\User::is_academic)
        return 'academic';
        elseif($id == \App\Models\User::is_secretary)
        return 'secretary';
        elseif($id == \App\Models\User::is_accountant)
        return 'accountant';
        elseif($id == \App\Models\User::is_procurement)
        return 'procurement';
    }


    /**
     * User roles.
     *
     */

    public const is_head = 1;

    // public const is_bishop = 2;

    public const is_academic = 3;

    public const is_secretary = 4;
    
    public const is_accountant = 5;

    public const is_procurement = 6;

    public const is_student = 7;
    
    public const is_other = 8;

    // public const is_internal_auditor = 8;

}
