<?php
namespace Numerus\Repositories;

use Numerus\Articles;
use Config;
class SearchRepository  extends Repository {
	public function __construct(Articles $articles) {
		$this->model = $articles;

	}
	public function getSearch($select = "*", $take = FALSE, $pagination = FALSE, $keyword = False) {
		$builder = $this->model->select($select);

		if ($take) {
			$builder->take($take);
		}
		if ($keyword) {
           $title='title_'.app()->getLocale();
           $text='text_'.app()->getLocale();
			$builder->where($title, 'LIKE', "%{$keyword}%")->orWhere(
			$text, 'LIKE', "%{$keyword}%")->get();
		}

		if ($pagination) {
			return $builder->paginate(Config::get('settings.paginate'));
		}

		return $builder->get();

	}

}