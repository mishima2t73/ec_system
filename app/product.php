<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
     protected $guarded = ['_token'];
 public function scopeSerach(Builder $query,array $params):Builder
 {
     

     //if (!empty($params['maker']))$query->where('maker','dell');

 }   
 protected $table='products';
}
