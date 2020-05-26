<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr; // DÙNG CHO HIỂN THỊ TARGET

class Slide extends Model
{
    protected $table   = 'slides';
    protected $guarded = [''];

     protected $type = [
         1 => [
                'name' => '_blank'
              ],
         2 => [
                'name' => '_self'
              ],
         3 => [
                'name' => '_parent'
              ],
         4 => [
                'name' => '_top'
              ],
         
    ];

    public function getType() // Hiển thị type sang index.php
    {
    	return Arr::get($this->type, $this->sd_target, "N/A");
    }
}
