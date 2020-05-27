<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	//fillable example
   //protected $fillable = ['title', 'content', 'image'];

   //guarded example
   protected $guarded = [];

   public function user()
   {

   	return $this->hasOne('App\User');
   }


}
