<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =[
      'title',
      'category',
      'content',
      'image',
      'tag_id',
    ];

    public function tag()
    {
      return $this->belongsTo(Tag::class);
    }

    public function user()
    {
      return $this->HasOne(User::class);
    }
}
