<?php

namespace Numerus\Repositories;

use Numerus\Menu;

class MenusRepository extends Repository {
	
	public function __construct(Menu $menu){
		$this->model= $menu;
	}
}