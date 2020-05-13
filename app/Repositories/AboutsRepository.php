<?php

namespace Numerus\Repositories;

use Numerus\Abouts;

class AboutsRepository extends Repository {
	
	public function __construct(Abouts $abouts){
		$this->model= $abouts;


	}



}