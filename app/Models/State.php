<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['likes', 'views', 'article_id'];
    //мы не достаем статьи из статистики поэтом тут нет зависимостей
    public $timestamps = false;
}
