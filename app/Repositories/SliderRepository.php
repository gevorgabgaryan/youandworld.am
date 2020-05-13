<?php

namespace Numerus\Repositories;

use Numerus\Slider;

class SliderRepository extends Repository {
	
	public function __construct(Slider $slider){
		$this->model= $slider;
	}
}