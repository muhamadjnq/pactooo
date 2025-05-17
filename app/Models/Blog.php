<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// blogs class instance will refer to blogs table in database
class Blog extends Model
{
  //restricts columns from modifying
  protected $guarded = [];
  protected $fillable = ['author_id', 'title', 'body', 'is_published', 'slug', 'img', 'status'];


  // blogs has many comments
  // returns all comments on that blog
  public function comments()
  {
    return $this->hasMany('App\Models\Comments', 'on_blog');
  }

  // returns the instance of the user who is author of that blog
  public function author()
  {
    return $this->belongsTo('App\Models\User', 'author_id');
  }
}
