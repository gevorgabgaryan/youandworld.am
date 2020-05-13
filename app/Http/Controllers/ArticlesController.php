<?php

namespace Numerus\Http\Controllers;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Config;
use Numerus\Repositories\ArticlesRepository;
use Numerus\Repositories\CommentRepository;
use Numerus\Categories;
class ArticlesController extends SiteController {

	public function __construct(ArticlesRepository $a_rep, CommentRepository $c_rep) {
		parent::__construct(new \Numerus\Repositories\MenusRepository(new \Numerus\Menu), new \Numerus\Repositories\AboutsRepository(new \Numerus\Abouts));
		$this->a_rep = $a_rep;
		$this->c_rep = $c_rep;
		$this->tamplate = 'articles';
	}

	public function index($cut_alias = FALSE) {
		//
      return redirect()->route('home',app()->getLocale());
	}
	public function getComment($take) {

		$comment = $this->c_rep->get("*", $take);

		return $comment;

	}
	public function getPost($take) {

		$post = $this->a_rep->get("*", $take);

		return $post;

	}
	public function getArticles($alias = 1) {

		$where = array();

		if ($alias) {
			$id = Categories::select('id')->where($al, $alias)->first()->id;
			$where = ['category_id', $id];

		}

		$article = $this->a_rep->get("*", FALSE, TRUE);
		if ($article) {
			$article->load("user", "categories", "comment");
		}
		return $article;

	}
	public function show($locale, $alias = FALSE) {
		
           $al= 'alias_'.app()->getLocale();               
           $tit= 'title_'.app()->getLocale(); 
           $desc='desc_'.app()->getLocale();
           $keywords='keywords_'.app()->getLocale();                       




		$this->tamplate = 'article';

		$article = $this->a_rep->one($alias, ['comment' => TRUE]);

		$abouts = $this->getAbout();
	
		$items = $this->getMenu();
			
		$randomArticle=$this->getRandomArticle();
        $title=$article->$tit;
      
      	$this->vars = array_add($this->vars, 'title', $title);
         $ogtitle=$article->$tit;
         
         $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
         $ogurl=route('articles.show', ['alias'=>$article->$al,'locale'=>app()->getLocale()]);
         
         $this->vars = array_add($this->vars, 'ogurl', $ogurl);  
         $ogimage=asset("numerus")."/images/".$article->img;
         $this->vars = array_add($this->vars, 'ogimage', $ogimage);
         $ogdesc=$article->$desc;
      
         $this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
         $keywords=str_limit($article->$keywords, 50) ;
          
		$this->vars = array_add($this->vars, 'keywords', $keywords);
		 $metaContent=str_limit($article->$desc, 150) ;
		$this->vars = array_add($this->vars, 'metaContent', $metaContent);

		$content = view('article_content')->with(['article' => $article, "abouts" => $abouts,"items" => $items, "randomArticle"=>$randomArticle])->render();
		  
		$og = view('og')->with('article', $article)->render();

		
		$this->vars = array_add($this->vars, 'content', $content);
        $this->vars = array_add($this->vars, 'og', $og);
		return $this->renderOutput();

	}

	public function getRandomArticle(){

		$randomArticle= $this->a_rep->getRand("*");


		return $randomArticle;

	}

}
