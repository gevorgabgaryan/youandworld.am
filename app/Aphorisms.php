<?php

namespace Numerus;

use Illuminate\Database\Eloquent\Model;

class Aphorisms extends Model
{
    //

     public function getRouteKeyName()
				{
				    return 'alias_hy';
				}

        protected $fillable=['keywords_hy' , 'title_hy','alias_hy', 'desc_hy', 'keywords_ru', 'title_ru','alias_ru', 'desc_ru','title_en', 'keywords_en','alias_en', 'desc_en','img'];
}
