<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'news_code', 'name', 'title', 'news_date', 'search_word', 'news_url', 'description', 'news_type', 'source', 'tags', 'status','deleted_at'
    ];
    protected $dates = ['news_date'];
}
