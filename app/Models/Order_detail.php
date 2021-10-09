<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $guarded = ['id'];
    protected $timestamp = true;

    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
