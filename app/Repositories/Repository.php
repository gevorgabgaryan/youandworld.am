<?php

namespace Numerus\Repositories;

use Config;

abstract class Repository {
	protected $model = FALSE;

	public function get($select = "*", $take = FALSE, $pagination = FALSE, $where = False) {
		$builder = $this->model->select($select);

		if ($take) {
			$builder->take($take);
		}
		if ($where) {
			$builder->where($where[0], $where[1]);
		}

		if ($pagination) {
			return $builder->paginate(Config::get('settings.paginate'));
		}

		return $builder->get();

	}
	public function one($alias, $attr = array()) {
		
		$result = $this->model->where('alias_hy', $alias)->orWhere('alias_en', $alias)->orWhere('alias_ru', $alias)->first();
		return $result;
	}
	public function oneAdmin($alias, $attr = array()) {
		$result = $this->model->where('alias_hy', $alias)->first();
		return $result;
	}
	     public function getRand($select = "*") {
        $builder = $this->model->select($select)->orderByRaw('RAND()');

        
        return $builder->get();

    }
	public function transliterate($string){
		$str=mb_strtolower($string);
		$leter_array = array(
		
		'a' => 'ա',
		'b' => 'բ',
		'g' => 'գ',
		'd' => 'դ',
		'e' => 'ե',
		'z' => 'զ',
		'e' => 'է',
		'y' => 'ը',
		't' => 'թ',
		'jh' => 'ժ',
		'i' => 'ի',
		'l' => 'լ',
		'x' => 'խ',
		'ts"' => 'ծ',
		'k' => 'կ',
		'h' => 'հ',
		'dz' => 'ձ',
		'gh' => 'ղ',
		'tw' => 'ճ',
		'm' => 'մ',
		'y' => 'յ',
		'n' => 'ն',
		'sh' => 'շ',
		'o' => 'ո',
		'ch' => 'չ',
		'p' => 'պ',
		'j' => 'ջ',
		'r' => 'ռ',
		's' => 'ս',
		'v' => 'վ',
		't' => 'տ',
		'r' => 'ր',
		'c' => 'ց',
		'w' => 'ւ',
		'p' => 'փ',
		'q' => 'ք',
		'o' => 'օ',
		'f' => 'ֆ',
		'u' => 'ու',
		'ev' => 'և'
	);
		foreach($leter_array as $leter=>$arm){
			$arm=explode(',',$arm);
			$str=str_replace($arm, $leter, $str);
		}
       $str=preg_replace('/(\s|[^A-Za-z0-9\-])+/', '-', $str);
		$str=trim($str);

		  return $str;

	}
	public function getRouteKeyName() {
        return 'alias';
    }
  

  
}

?>