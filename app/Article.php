<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
