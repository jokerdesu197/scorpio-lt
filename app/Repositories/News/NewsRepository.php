<?php

namespace App\Repositories\News;

use App\Repositories\EloquentRepository;
//use Your Model

/**
 * Class NewsRepository.
 */
class NewsRepository extends EloquentRepository implements NewsRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\News::class;
    }

    public function getListNews()
    {
    	$qb = $this->_model::whereNull('news.deleted_at');
	   	return $qb;
    }

    public function getNews($id)
    {
        $qb = $this->_model::where('id', $id)->first();
        return $qb;
    }
}
