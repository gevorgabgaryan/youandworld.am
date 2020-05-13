<?php

namespace Numerus;

use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
         public function getRouteKeyName()
{
    return 'alias_hy';
}
  
    protected $fillable=['title_hy','keywords_hy' , 'text_hy','alias_hy', 'desc_hy','title_ru', 'keywords_ru', 'text_ru','alias_ru', 'desc_ru','title_en', 'keywords_en', 'text_en','alias_en', 'desc_en', 'category_id','img'];
    public function user(){
    	return $this->belongsTo('Numerus\User');
    }


}
