<?php

namespace Numerus\Http\Controllers;

use Illuminate\Http\Request;
use Numerus\Repositories\AphorismsRepository;
use Numerus\Repositories\ArticlesRepository;

class AphorismsController extends SiteController
{
    //

     public function __construct(ArticlesRepository $a_rep, AphorismsRepository $ap_rep){
     parent::__construct(new \Numerus\Repositories\MenusRepository(new \Numerus\Menu), new \Numerus\Repositories\AboutsRepository(new \Numerus\Abouts));
       $this->ap_rep=$ap_rep;
        $this->a_rep = $a_rep;
     $this->tamplate='aphorisms';
   }

       public function index()
    {
        //
        $aphorisms=$this->getAphorisms();
        
        $items = $this->getMenu();
        $randomArticle=$this->getRandomArticle();
        $title=trans('lang.aphorism').trans('lang.title');
        $this->vars = array_add($this->vars, 'title', $title);
        $keywords=trans('lang.akeywords');
        $this->vars = array_add($this->vars, 'keywords', $keywords);
        $metaContent=trans('lang.ametaContent');
        
        $ogtitle=trans('lang.aphorism').trans('lang.title');;
        $ogimage="https://youandworld.am/numerus/images/aphirism.jpeg";
        $ogurl="https://youandworld.am/".app()->getLocale()."/aphorisms";
        $ogdesc=trans('lang.ametaContent');

        $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
		$this->vars = array_add($this->vars, 'ogimage', $ogimage);
		$this->vars = array_add($this->vars, 'ogurl', $ogurl);
		$this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
        $this->vars = array_add($this->vars, 'metaContent', $metaContent);
         $slider=view('aphorisms_content')->with(['aphorisms'=>$aphorisms, "items" => $items, "randomArticle"=>$randomArticle])->render();
         $this->vars=array_add($this->vars,'slider', $slider);


        return $this->renderOutput();
    }

       public function getAphorisms(){
        $aphorisms=$this->ap_rep->get();
    
        return $aphorisms;
    }
      public function getRandomArticle(){

    $randomArticle= $this->a_rep->getRand("*");


    return $randomArticle;

  }
       public function show($locale,$alias = FALSE) {
         $al= 'alias_'.app()->getLocale();               
         $tit= 'title_'.app()->getLocale(); 
         $desc='desc_'.app()->getLocale();
         $keywords='keywords_'.app()->getLocale(); 
        $this->tamplate = 'aphorism';
        $aphorism = $this->ap_rep->one($alias);
        $abouts = $this->getAbout();
        $items = $this->getMenu();
        $randomArticle=$this->getRandomArticle();
          $title=$aphorism->$tit;
          $this->vars = array_add($this->vars, 'title', $title);
         $ogtitle=$aphorism->$tit;
         $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
         $ogurl=route('aphorisms.show', ['alias'=>$aphorism->$al,'locale'=>app()->getLocale()]);
         $this->vars = array_add($this->vars, 'ogurl', $ogurl);  
         $ogimage=asset("numerus")."/images/".$aphorism->img;
         $this->vars = array_add($this->vars, 'ogimage', $ogimage);
         $ogdesc=$aphorism->$desc;
         $this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
         $keywords=str_limit($aphorism->$keywords, 50) ;
        $this->vars = array_add($this->vars, 'keywords', $keywords);
        $metaContent=str_limit($aphorism->$desc, 150) ;
        $this->vars = array_add($this->vars, 'metaContent', $metaContent);
        $content = view('aphorism_content')->with(['aphorism' => $aphorism, "abouts" => $abouts,"items" => $items, "randomArticle"=>$randomArticle])->render();
        $og = view('og')->with('article', $aphorism)->render();
        
        $this->vars = array_add($this->vars, 'content', $content);
        $this->vars = array_add($this->vars, 'og', $og);
        return $this->renderOutput();

    }


}
