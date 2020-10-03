<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
  protected $fillable = [

          'branches_name',
          'branches_location',
      ];
  protected $primaryKey =   'branches_id';
  }
