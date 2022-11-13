<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;
    protected $table = 'article_comments';
    protected $guarded = ['id'];

    public function articles()
    {
    }
    public function article_comment()
    {
    }
}
