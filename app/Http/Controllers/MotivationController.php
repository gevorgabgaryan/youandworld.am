<?php

namespace Numerus\Http\Controllers;

use Config;
use Numerus\Categories;
use Numerus\Repositories\ArticlesRepository;

class MotivationController extends SiteController {

	public function __construct(ArticlesRepository $a_rep) {
		parent::__construct(new \Numerus\Repositories\MenusRepository(new \Numerus\Menu), new \Numerus\Repositories\AboutsRepository(new \Numerus\Abouts));
		$this->a_rep = $a_rep;
		$this->tamplate = 'motivation';

	}

	public function index($cut_alias = 'motivation') {
		//
		$articles = $this->getArticles($cut_alias);
		$title=trans('lang.motivation').trans('lang.youandworld');
        $this->vars = array_add($this->vars, 'title', $title);
        $keywords=trans('lang.mkeywords');
        $this->vars = array_add($this->vars, 'keywords', $keywords);
        $metaContent=trans('lang.mmetaContent');
        $this->vars = array_add($this->vars, 'metaContent', $metaContent);
        
        $ogtitle=trans('lang.motivation').trans('lang.title');
        $ogimage="https://youandworld.am/numerus/images/motivation.jpg";
        $ogurl="https://youandworld.am/".app()->getLocale()."/motivation";
        $ogdesc=trans('lang.mmetaContent');
        
        $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
		$this->vars = array_add($this->vars, 'ogimage', $ogimage);
		$this->vars = array_add($this->vars, 'ogurl', $ogurl);
		$this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
		
		
		$pagetitle="motivation";
        $this->vars = array_add($this->vars, 'pagetitle', $pagetitle);
        $content=view('content')->with(['articles'=>$articles,'pagetitle'=>$pagetitle])->render();
		$this->vars = array_add($this->vars, 'content', $content);
		$abouts = $this->getAbout();
		$asideArticles = $this->getPost(config("settings.resent_articles"));
		$this->contentRightBar = view("indexBar")->with(["abouts" => $abouts, "asideArticles" => $asideArticles]);

		return $this->renderOutput();

	}

	public function getPost($take) {

		$asideArticles = $this->a_rep->get("*", $take);

		return $asideArticles;

	}
	public function getAbout() {
		$abouts = $this->ab_rep->get();

		return $abouts;
	}
	public function getArticles($alias = 'motivation') {

		$where = FALSE;

		$where = ['category_id', 2];

		$success = $this->a_rep->get("*", FALSE, TRUE, $where);
		if ($success) {
			$success->load("user", "categories", "comment");
		}
		return $success;

	}

}
