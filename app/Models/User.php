<?php

namespace App;

use App\Models\Cart;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const NORMAL = 0;
    const GOLD = 1;
    const DIAMOND = 2;

    const ADMIN = 1;
    const NOT_ADMIN = 0;

    const MALE = 0;
    const FERMALE = 1;
    const ORTHER = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'order',
        'level',
        'birthday',
        'gender',
        'location',
        'notes',
        'avatar',
        'admin',
        'balence',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'birthday',
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
        return Carbon::parse($this->attributes['deleted_at'])->format('d-m-Y');
    }

    public function getBirthdayAttribute()
    {
        if (!$this->attributes['birthday']) {
            return null;
        }
        return Carbon::parse($this->attributes['birthday'])->format('d-m-Y');
    }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::parse($value);
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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
