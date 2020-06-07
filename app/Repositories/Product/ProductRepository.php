<?php

namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;
//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getListProduct()
    {
    	$qb = $this->_model::whereNull('products.deleted_at');
	   	return $qb;
    }

    public function getProduct($id)
    {
        $qb = $this->_model::where('id', $id)->first();
        return $qb;
    }
}
