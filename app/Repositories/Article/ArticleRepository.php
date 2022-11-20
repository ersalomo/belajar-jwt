<?php

namespace App\Repositories\Article;

interface ArticleRepository
{
    public function paginate(int $value);
    public function detail(Article $article);
}
