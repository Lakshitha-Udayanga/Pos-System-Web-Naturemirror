<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductHasFreeStock extends Model
{
    protected $guarded = [];
    protected $table = 'product_has_free_stocks';
}
