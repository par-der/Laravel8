<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    //указываем какие поля должны быть при массовом заполнении
    protected $fillable = ['title', 'body', 'img', 'slug'];

    // для кастомного Carbon published_at
    //public array $dates = ['published_at'];

    //какие поля не должны быть доступны при массовом заполднении
    //protected $guarded = [''];

    //данная модель может иметь несколько комментариев
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //данная модель может иметь один комментариев
    public function state()
    {
        return $this->hasOne(State::class);
    }

    //данная модель может иметь много комментариев
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // возвращает преобразованное поле body первые 100 символов
    public function getBodyPreview(){
        return Str::limit($this->body, 100);
    }

    // возвращает преобразованое поле created_at
    public function createdAtForHumans(){
        return $this->created_at->diffForHumans();
        //return $this->published_at->diffForHumans();
    }

    // возвращает запрос весь что был в логике
    public function scopeLastLimit($query){ //добавить $numbers сюда и в limit
        return $query->with('tags', 'state')->orderBy('created_at', 'DESC')->limit(6)->get();
    }

    public function scopeAllPaginate($query) //добавить $numbers сюда и в paginate
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate(10);
    }

    // помогает найти статью по slug
    public function scopeFindBySlug($query, $slug)
    {
        return $query->with('comments','tags', 'state')->where('slug', $slug)->firstOrFail();
    }

    public function scopeFindByTag($query)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate(10);
    }
}
