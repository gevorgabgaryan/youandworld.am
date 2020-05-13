<?php

namespace Numerus;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //

public function articles(){

	return $this->hasmany('Numerus\Articles');
}

}
