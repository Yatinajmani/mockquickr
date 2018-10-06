<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'user_id',
		'post_id',
		'comment',
	];

	public function User()
	{
		return $this->belongsTo('App\User','user_id','id');
	}

	public function Post()
	{
		return $this->belongsTo('App\Post','post_id','id');
	}

    public function scopeFilterById($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeFilterByPostId($query, $id)
    {
        return $query->where('post_id', $id);
    }

    public function scopeFilterByUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }
    
	public function Reply()
	{
		return $this->hasMany('App\Reply','comment_id');
	}

}
