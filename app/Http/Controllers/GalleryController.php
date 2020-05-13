<?php

namespace Numerus\Http\Controllers;

use Illuminate\Http\Request;
use Numerus\Repositories\ArticlesRepository;
use Numerus\Repositories\CommentRepository;
use Numerus\Repositories\GallerySliderRepository;


class GalleryController extends SiteController
{
    //

     public function __construct(GallerySliderRepository $gs_rep, ArticlesRepository $a_rep, CommentRepository $c_rep){
     parent::__construct(new \Numerus\Repositories\MenusRepository(new \Numerus\Menu), new \Numerus\Repositories\AboutsRepository(new \Numerus\Abouts));
       $this->a_rep=$a_rep;
     $this->c_rep=$c_rep;
     $this->gs_rep=$gs_rep;
     $this->tamplate='galleryslider';
   }

       public function index()
    {
        //
        $galleryslider=$this->getGallerySlider();
        
        $items = $this->getMenu();
        $randomArticle=$this->getRandomArticle();
        $title=trans('lang.gallery').trans('lang.title');
        $this->vars = array_add($this->vars, 'title', $title);
        $keywords=trans('lang.gkeywords');
        $this->vars = array_add($this->vars, 'keywords', $keywords);
        $metaContent=trans('lang.gmetaContent');
        $this->vars = array_add($this->vars, 'metaContent', $metaContent);
        
        
        $ogtitle=trans('lang.gallery').trans('lang.title');
        $ogimage="https://youandworld.am/numerus/images/gallery.jpg";
        $ogurl="https://youandworld.am/".app()->getLocale()."/gallery";
        $ogdesc=trans('lang.gmetaContent');
        
        
        $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
		$this->vars = array_add($this->vars, 'ogimage', $ogimage);
		$this->vars = array_add($this->vars, 'ogurl', $ogurl);
		$this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
        
        
         $slider=view('galleryslider_content')->with(['galleryslider'=>$galleryslider, "items" => $items, "randomArticle"=>$randomArticle])->render();
         $this->vars=array_add($this->vars,'slider', $slider);

          $comment=$this->getComment(config("settings.resent_comment"));
   


        return $this->renderOutput();
    }
    public function getRandomArticle(){

        $randomArticle= $this->a_rep->getRand("*");


        return $randomArticle;

    }
    public function getComment($take){

     $comment =$this->c_rep->get("*", $take);


     return $comment;

 }
     public function getPost($take){

 
     
     $post=$this->a_rep->get("*", $take);
  
     return $post;

 }
       public function getGallerySlider(){
        $galleryslider=$this->gs_rep->get();
      
        return $galleryslider;
    }


        public function show($locale,$alias = FALSE) {
        $al= 'alias_'.app()->getLocale();               
         $tit= 'title_'.app()->getLocale(); 
         $desc='desc_'.app()->getLocale();
         $keywords='keywords_'.app()->getLocale(); 


        $this->tamplate = 'galleryslide';
        $galleryslide = $this->gs_rep->one($alias, ['comment' => TRUE]);
        $abouts = $this->getAbout();
        $items = $this->getMenu();
        $randomArticle=$this->getRandomArticle();
        $title=$galleryslide->$tit;
        $this->vars = array_add($this->vars, 'title', $title);
         $ogtitle=$galleryslide->$tit;
         $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
         $ogurl=route('gallery.show', ['alias'=>$galleryslide->$al, 'locale'=>app()->getLocale()]);
         $this->vars = array_add($this->vars, 'ogurl', $ogurl);  
         $ogimage=asset("numerus")."/images/".$galleryslide->img;
         $this->vars = array_add($this->vars, 'ogimage', $ogimage);
         $ogdesc=$galleryslide->$desc;
         $this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
         $keywords=str_limit($galleryslide->$keywords, 50) ;
        $this->vars = array_add($this->vars, 'keywords', $keywords);
         $metaContent=str_limit($galleryslide->$desc, 150) ;
        $this->vars = array_add($this->vars, 'metaContent', $metaContent);
        $content = view('galleryslide_content')->with(['galleryslide' => $galleryslide, "abouts" => $abouts,"items" => $items, "randomArticle"=>$randomArticle])->render();
        $og = view('og')->with('article', $galleryslide)->render();
        
        $this->vars = array_add($this->vars, 'content', $content);
        $this->vars = array_add($this->vars, 'og', $og);
        return $this->renderOutput();

    }



}
