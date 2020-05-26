<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr; // DÙNG CHO HIỂN THỊ TYPE

class PagesStatic extends Model
{
    protected $table   = 'statics';
    protected $guarded = [''];

    protected $type = [
    	'1' => 'Chính sách mua hàng & thanh toán',
        '2' => 'Chính sách giao nhận',
        '3' => 'Về chúng tôi'
    ];

    public function getType()
    {
    	return Arr::get($this->type, $this->s_type, "N/A");
    }
}
