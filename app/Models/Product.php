<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
        'products_name',
        'products_dis',
        'categories_id',
    ];
  //  use HasFactory;
  protected $primaryKey = 'products_id';
}
