<?php

namespace App\Models;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryDetail extends Model
{
    //
    use SoftDeletes;
    protected $fillable =[
        'history_id',
        'product_id',
        'name',
        'cost',
        'quantity',
    ];
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getCreatedAtAttribute()
    {
        if (!$this->attributes['created_at']) {
            return null;
        }
        return Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function history()
    {
        return $this->belongsToMany(History::class);
    }
}
