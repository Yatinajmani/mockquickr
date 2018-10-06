<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function scopeFilterById($query, $id)
    {
        return $query->where('id', $id);
    }

	public function Post()
	{
		return $this->hasMany('App\Post','category_id');
	}

    public function scopeFilterLikeCategory($query, $name)
    {
        return $query->where('name', 'like', $name);
    }

}
