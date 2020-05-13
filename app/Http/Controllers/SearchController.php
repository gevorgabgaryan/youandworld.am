<?php

namespace Numerus\Http\Controllers;
use Config;
use Illuminate\Support\Facades\Input;
use Numerus\Repositories\ArticlesRepository;
use Numerus\Repositories\SearchRepository;

class SearchController extends SiteController {

	public function __construct(ArticlesRepository $a_rep, SearchRepository $sch_rep) {
		parent::__construct(new \Numerus\Repositories\MenusRepository(new \Numerus\Menu), new \Numerus\Repositories\AboutsRepository(new \Numerus\Abouts));
		$this->a_rep = $a_rep;
		$this->sch_rep = $sch_rep;
		$this->tamplate = 'search';
		//
	}

	public function getSearch() {

		//get keywords input for search
		$keyword = Input::get('search');

		//search that student in Database
		$articles = $this->searchArticles($keyword);

		$pagetitle="search";
        $this->vars = array_add($this->vars, 'pagetitle', $pagetitle);
        $content=view('content')->with(['articles'=>$articles,'pagetitle'=>$pagetitle])->render();

		$this->vars = array_add($this->vars, 'content', $content);
		$abouts = $this->getAbout();
		$asideArticles = $this->getPost(config("settings.resent_articles"));
		$this->contentRightBar = view("indexBar")->with(["abouts" => $abouts, "asideArticles" => $asideArticles]);

		//return display search result to user by using a view
		return $this->renderOutput();

	}
	protected function searchArticles($keyword ) {

		$articles = $this->sch_rep->getSearch("*", FALSE, TRUE, $keyword);
		return $articles;

	}

	public function getPost($take) {

		$asideArticles = $this->a_rep->get("*", $take);

		return $asideArticles;

	}
	public function getAbout() {
		$abouts = $this->ab_rep->get();

		return $abouts;
	}

}