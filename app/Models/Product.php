<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'category_id', 'description', 'image', 'cost', 'quantity'
    ];
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];
}
