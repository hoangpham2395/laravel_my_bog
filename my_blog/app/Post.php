<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'author_id', 'title', 'slug', 'excerpt', 'body', 'image', 'category_id'
    ];

    // Liên kết dữ liệu với bảng users
    public function author() 
    {
    	return $this->belongsTo('App\User');
    }

    public function category() 
    {
        return $this->belongsTo('App\Category');
    }

    public function comment() 
    {
        return $this->belongsTo('App\Comment');
    }

    // Lấy link ảnh
    public function getImageUrlAttribute($value) 
    {
    	$imageUrl = '';

    	if (! is_null($this->image)) 
    	{
    		$imagePath = public_path().'/images/'.$this->image;
    		if (file_exists($imagePath)) $imageUrl = asset('images/'.$this->image);
    	}

    	return $imageUrl;
    }

    // Định dạng ngày để hiển thị
    public function getDateAttribute($value) 
    {
    	// return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
        return $this->created_at->diffForHumans();
    }

    // Sắp xếp theo published_at
    public function scopeOrderDesc($query) 
    {
        return $query->orderBy('published_at', 'desc');
    }

    // Lấy những published_at not null
    public function scopePublished($query) 
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
}
