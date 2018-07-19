<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
// app/Post.php

/**
 * Fields that are mass assignable
 *
 * @var array
 */
protected $guarded = [];

public function user()
{
  return $this->belongsTo(User::class);
}
}
