<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr; // DÙNG CHO HIỂN THỊ TYPE

class Rating extends Model
{
    protected $table   = 'ratings';
    protected $guarded = [''];
    protected $type  = [
        '1' => [
            'name' => 'Chất lượng kém'
        ],
        '2' => [
            'name' => 'Chất lượng khá'
        ],
        '3' => [
            'name' => 'Chất lượng tốt'
        ],
        '4' => [
            'name' => 'Chất lượng rất tốt'
        ],
    ];

     public function product()
    {
        return $this->belongsTo(Product::class, 'r_product_id');  // bảng attribute liên kết vs bảng Category qua khóa ngoại atb_attribute_id (quan hệ  nhiều)
    }

     public function user()
    {
        return $this->belongsTo(User::class, 'r_user_id');  // bảng attribute liên kết vs bảng Category qua khóa ngoại atb_attribute_id (quan hệ  nhiều)
    }

    public function getType() // Hiển thị status sang index.php
    {
        return Arr::get($this->type, $this->r_type, "N/A");
    }

}
