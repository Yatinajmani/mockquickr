<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'user_id',
		'category_id',
		'title',
		'image_path',
		'description',
		'Starting_bid',
		'is_sold',
		'buyer_id',
	];

	public function User()
	{
		return $this->belongsTo('App\User','user_id','id');
	}

	public function Buyer()
	{
		return $this->belongsTo('App\User','buyer_id','id');
	}

	public function Category()
	{
		return $this->belongsTo('App\Category','category_id','id');
	}

    public function ScopeFilterById($query, $id)
    {
        return $query->where('id', $id);
    }

    public function ScopeFilterByCategoryId($query, $id)
    {
        return $query->where('category_id', $id);
    }

    public function ScopeFilterByUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function ScopeFilterByTitle($query, $title)
    {
        return $query->where('title', 'like', '%'.$title.'%');
    }

    public function ScopeIsSold($query)
    {
    	return $query->where('is_sold',1);
    }

	public function Comment()
	{
		return $this->hasMany('App\Comment','post_id');
	}

	public function Bid()
	{
		return $this->hasMany('App\Bid','post_id');
	}

}
