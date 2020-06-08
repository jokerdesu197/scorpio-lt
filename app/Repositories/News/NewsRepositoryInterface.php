<?php

namespace App\Repositories\News;

interface NewsRepositoryInterface
{
    public function getModel();

    public function getListNews();

    public function getNews($id);
}
