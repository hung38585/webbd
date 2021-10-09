<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $timestamp = true;
    
    public function product()
    {
    	return $this->hasMany('App\Models\Product');	
    }
}
