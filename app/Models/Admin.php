<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  protected $fillable = [
        'admins_name',
        'admins_email',
        'admins_phone',
        'branches_id',
    ];
  //  use HasFactory;
  protected $primaryKey = 'admins_id';
}
