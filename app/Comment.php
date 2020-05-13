<?php

namespace Numerus;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

protected $fillable=['name', 'email', 'text','site', 'user_id', 'parent_id'];
    
public function articles(){
	return $this->belongsTo('Numerus\Articles');
}
public function user(){
	return $this->belongsTo('Numerus\User');
}


}
