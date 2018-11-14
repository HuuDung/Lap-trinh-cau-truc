<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const ACTIVED = 1;
    const BLOCKED = 0;

    const NORMAL = 0;
    const GOLD = 1;
    const DIAMOND = 2;

    const ADMIN = 1;

    const MALE = 0;
    const FERMALE = 1;
    const ORTHER = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'order', 'level', 'birthday', 'gender', 'location', 'notes', 'avatar',
    ];
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at', 'birthday'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getCreatedAtAttribute()
    {
        if (!$this->attributes['created_at']) {
            return null;
        }
        return Carbon::parse($this->attributes['created_at'])->format('F Y');
    }

    public function getDeletedAtAttribute()
    {
        if (!$this->attributes['deleted_at']) {
            return null;
        }
        return Carbon::parse($this->attributes['deleted_at'])->format('m/d/Y');
    }

    public function getBirthdayAttribute()
    {
        if (!$this->attributes['updated_at']) {
            return null;
        }
        return Carbon::parse($this->attributes['updated_at'])->format('m/d/Y');
    }

    public function isAdmin()
    {
        return $this->admin == self::ADMIN;
    }

    public function isMale()
    {
        return $this->gender == self::MALE;
    }

    public function isFermale()
    {
        return $this->gender == self::FERMALE;
    }

    public function getAgeAttribute()
    {
        if (!$this->attributes['birthday']) {
            return null;
        }
        return Carbon::parse($this->attributes['birthday'])->age;
    }
}
