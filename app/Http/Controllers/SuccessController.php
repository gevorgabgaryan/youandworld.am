<?php

namespace Numerus\Http\Controllers;

use Config;
use Numerus\Repositories\ArticlesRepository;

class SuccessController extends SiteController {

	public function __construct(ArticlesRepository $a_rep) {
		parent::__construct(new \Numerus\Repositories\MenusRepository(new \Numerus\Menu), new \Numerus\Repositories\AboutsRepository(new \Numerus\Abouts));
		$this->a_rep = $a_rep;
		$this->tamplate = 'success';

	}

	public function index($cut_alias = 'success') {
		//
		$articles = $this->getArticles($cut_alias);
	    $title=trans('lang.success').trans('lang.title');
        $this->vars = array_add($this->vars, 'title', $title);
        $keywords=trans('lang.skeywords');
        $this->vars = array_add($this->vars, 'keywords', $keywords);
        $metaContent=trans('lang.smetaContent');
        $this->vars = array_add($this->vars, 'metaContent', $metaContent);
        
        $ogtitle=trans('lang.success').trans('title');
        $ogimage="https://youandworld.am/numerus/images/success.jpg";
        $ogurl="https://youandworld.am/".app()->getLocale()."/success";
        $ogdesc=trans('lang.smetaContent');
        
        
        $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
		$this->vars = array_add($this->vars, 'ogimage', $ogimage);
		$this->vars = array_add($this->vars, 'ogurl', $ogurl);
		$this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
		
		$pagetitle="success";
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
	public function getArticles($alias = 'success') {

		$where = FALSE;

		$where = ['category_id', 1];

		$success = $this->a_rep->get("*", FALSE, TRUE, $where);
		if ($success) {
			$success->load("user", "categories", "comment");
		}
		return $success;

	}

}
