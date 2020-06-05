<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductClass extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_code', 'product_id', 'product_group_id', 'product_type_id', 'stock', 'sale_limit', 'price', 'delivery_date', 'del_flg'
    ];
}
