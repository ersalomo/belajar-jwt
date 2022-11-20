<?php

namespace App\Repositories\Article;

class ArticleRepositoryImple implements ArticleRepository
{
    protected $model;
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->model = $articleRepository;
    }
    public function detail(Article $article)
    {
        return $article;
    }
    public function paginate(int $paginate)
    {
    }
}
