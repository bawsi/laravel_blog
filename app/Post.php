<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'body', 'user_id', 'category_id', 'thumbnail_path', 'header_path'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
