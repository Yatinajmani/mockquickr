<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	protected $fillable = [
		'user_id',
		'comment_id',
		'reply',
	];

	public function User()
	{
		return $this->belongsTo('App\User','user_id','id');
	}

	public function Comment()
	{
		return $this->belongsTo('App\Comment','comment_id','id');
	}

    public function scopeFilterById($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeFilterByCommentId($query, $id)
    {
        return $query->where('comment_id', $id);
    }

    public function scopeFilterByUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }
    
}