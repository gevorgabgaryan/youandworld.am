<?php

namespace Numerus\Http\Controllers;

use Config;
use Numerus\Repositories\PoemsRepository;
use Numerus\Repositories\ArticlesRepository;

use Numerus\Repositories\CommentRepository;

class PoemsController extends SiteController {

	public function __construct(PoemsRepository $pm_rep,ArticlesRepository $a_rep, CommentRepository $c_rep) {
		parent::__construct(new \Numerus\Repositories\MenusRepository(new \Numerus\Menu), new \Numerus\Repositories\AboutsRepository(new \Numerus\Abouts));
		$this->a_rep = $a_rep;
		$this->c_rep = $c_rep;
		$this->pm_rep = $pm_rep;
		$this->tamplate = 'poems';
	}

	public function index($cut_alias = FALSE) {
		//
		$poems = $this->getPoems();
		$title=trans('lang.success').trans('lang.title');
        $this->vars = array_add($this->vars, 'title', $title);
        $keywords=trans('lang.pkeywords');
        $this->vars = array_add($this->vars, 'keywords', $keywords);
        $metaContent=trans('lang.pmetaContent');
        $this->vars = array_add($this->vars, 'metaContent', $metaContent);
        
        $ogtitle=trans('lang.success').trans('lang.title');
        $ogimage="http://youandworld.am/numerus/images/poem.jpg";
        $ogurl="http://youandworld.am/".app()->getLocale()."/poems";
        $ogdesc=trans('lang.pmetaContent');
        
        
        $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
		$this->vars = array_add($this->vars, 'ogimage', $ogimage);
		$this->vars = array_add($this->vars, 'ogurl', $ogurl);
		$this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
        
        
        
        
	    $abouts = $this->getAbout();
		$content = view('poems_content')->with('poems', $poems)->render();
		$this->vars = array_add($this->vars, 'content', $content);
		$comment = $this->getComment(config("settings.resent_comment"));
		$post = $this->getPost(config("settings.resent_articles"));
		$this->contentRightBar = view("indexBar")->with(["comment" => $comment, "post" => $post,"abouts"=>$abouts]);

		return $this->renderOutput();

	}
	public function getComment($take) {

		$comment = $this->c_rep->get("*", $take);

		return $comment;


	}
	public function getPost($take) {

		$post = $this->pm_rep->get("*", $take);

		return $post;

	}
     public function getPoems(){
 
     

		$poems = $this->pm_rep->get("*", FALSE, TRUE);
	
		
        return $poems;
    }

	
	public function show($locale,$alias = FALSE) {
		 $al= 'alias_'.app()->getLocale();               
         $tit= 'title_'.app()->getLocale(); 
         $desc='desc_'.app()->getLocale();
         $keywords='keywords_'.app()->getLocale(); 
		$this->tamplate = 'poem';
		$poem = $this->pm_rep->one($alias);
		$abouts = $this->getAbout();
		$items = $this->getMenu();
		$randomArticle=$this->getRandomArticle();
        $title=$poem->$tit;
      	$this->vars = array_add($this->vars, 'title', $title);
         $ogtitle=$poem->$tit;
         $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
         $ogurl=route('poems.show', ['alias'=>$poem->$al, 'locale'=>app()->getLocale()]);
         $this->vars = array_add($this->vars, 'ogurl', $ogurl);  
         $ogimage=asset("numerus")."/images/".$poem->img;
         $this->vars = array_add($this->vars, 'ogimage', $ogimage);
         $ogdesc=$poem->$desc;
         $this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
         $keywords=str_limit($poem->$keywords, 50) ;
		$this->vars = array_add($this->vars, 'keywords', $keywords);
		 $metaContent=str_limit($poem->$desc, 150) ;
		$this->vars = array_add($this->vars, 'metaContent', $metaContent);
		$content = view('poem_content')->with(['poem' => $poem, "abouts" => $abouts,"items" => $items, "randomArticle"=>$randomArticle])->render();
		
		$this->vars = array_add($this->vars, 'content', $content);
 		return $this->renderOutput();

	}

	public function getRandomArticle(){

		$randomArticle= $this->a_rep->getRand("*");


		return $randomArticle;

	}

}
