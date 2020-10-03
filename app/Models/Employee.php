<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $fillable = [
        'employees_name',
        'employees_email',
        'employees_phone',
        'branches_id',
    ];
  //  use HasFactory;
  protected $primaryKey = 'employees_id';
}
