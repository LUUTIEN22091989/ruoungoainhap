<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table   = 'products';
    protected $guarded = [''];

    public function category()
    {
    	return $this->belongsTo('App\Models\Category', 'pro_category_id');  // bảng products liên kết vs bảng Category qua khóa ngoại pro_category_id (quan hệ 1 nhiều)
    }

    public function country()
    {
    	return $this->belongsTo('App\Models\Country', 'pro_country_id');  // bảng products liên kết vs bảng Category qua khóa ngoại pro_category_id (quan hệ 1 nhiều)
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'id');
    }
}
