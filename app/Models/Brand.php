<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table   = 'brands';
    protected $guarded = [''];

     public function brand_category()
    {
    	return $this->belongsTo('App\Models\Category', 'b_category_id');  // bảng products liên kết vs bảng Category qua khóa ngoại pro_category_id (quan hệ 1 nhiều)
    }
}
