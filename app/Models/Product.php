<?php

namespace App\Models;

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
        'name', 'group_id', 'search_word', 'title', 'description', 'unit', 'brand', 'status', 'deleted_at'
    ];
    public function getProductGroup($product_id)
    {
    	$group_id = DB::table('products')->select('product_group_id')->where('id', $product_id)->first();
    	return $group_id;
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
