<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'suppliers';
    protected $fillable = [
        'supplier_name', 'address', 'email', 'fax', 'tel_num', 'status'
    ];
}
