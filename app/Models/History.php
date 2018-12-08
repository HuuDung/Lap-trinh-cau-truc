<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    //
    use SoftDeletes;
    const CREDIT =1;
    const CASH = 2;

    const SUCCESS =1;
    const PENDING =2;
    const FAIL =3;

    protected $fillable =[
        'user_id',
        'name',
        'location',
        'phone',
        'type',
        'status',
        'amount',
    ];
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function historyDetails()
    {
        return $this->hasMany(HistoryDetail::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
