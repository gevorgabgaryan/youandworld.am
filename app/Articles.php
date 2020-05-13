<?php

namespace Numerus;


use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
       public function getRouteKeyName()
{
    return 'alias_hy';
}
       public function categories(){
    	return $this->belongsTo('Numerus\Categories', 'category_id',"id");
    }

    protected $fillable=['title_hy','keywords_hy' , 'text_hy','alias_hy', 'desc_hy','title_ru', 'keywords_ru', 'text_ru','alias_ru', 'desc_ru','title_en', 'keywords_en', 'text_en','alias_en', 'desc_en', 'category_id','img'];
    public function user(){
    	return $this->belongsTo('Numerus\User');
    }
     public function category(){
    	return $this->belongsTo('Numerus\categories');
    }
       public function comment(){
    	return $this->hasMany('Numerus\Comment');
    }

 
}
