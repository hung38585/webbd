<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = ['id'];
    protected $timestamp = true;
    
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function image()
    {
    	return $this->hasMany('App\Models\Image');	
    }
}
