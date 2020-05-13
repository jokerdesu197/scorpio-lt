<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'products';
    protected $fillable = [
        'name', 'group_id', 'search_word', 'title', 'description', 'unit', 'brand', 'status', 'del_flg'
    ];
}
