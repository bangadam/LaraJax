<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $table = 'crud';
    protected $fillable = [
      'first_name',
      'last_name',
      'address',
      'email'
    ];
}
