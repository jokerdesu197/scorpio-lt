<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'descripton'
    ];
}
