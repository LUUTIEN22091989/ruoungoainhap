<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr; // DÙNG CHO HIỂN THỊ TYPE


class Transaction extends Model
{
    protected $table   = 'transactions';
    protected $guarded = [''];

    protected $status  = [
    	'1' => [
    		'name' => 'Tiếp nhận'
    	],
    	'2' => [
    		'name' => 'Đã bàn giao'
    	],
    	'3' => [
    		'name' => 'Đơn hàng hủy'
    	],
    ];

    public function getStatus() // Hiển thị status sang index.php
    {
    	return Arr::get($this->status, $this->tst_status, "N/A");
    }
}
