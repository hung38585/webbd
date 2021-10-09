<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infomation extends Model
{
    use HasFactory;
    protected $table = 'infomations';
    protected $guarded = ['id'];
    protected $timestamp = true;
}
