<?php

namespace Numerus\Http\Controllers;

use Illuminate\Http\Request;


class AboutController extends SiteController
{
    //

     public function __construct(){
     parent::__construct(new \Numerus\Repositories\MenusRepository(new \Numerus\Menu), new \Numerus\Repositories\AboutsRepository(new \Numerus\Abouts));
 
     $this->tamplate='about';
   }

       public function index()
    {
        //
      
        $abouts=$this->getAbout();
        $title=trans('lang.about').trans('lang.title');
        $this->vars = array_add($this->vars, 'title', $title);
        $keywords=trans('lang.abkeywords');
        $this->vars = array_add($this->vars, 'keywords', $keywords);
        $metaContent=trans('lang.abmetaContent');
        $this->vars = array_add($this->vars, 'metaContent', $metaContent);
        
        $ogtitle=trans('lang.about').trans('lang.title');
        $ogimage="https://youandworld.am/numerus/images/fblogo.png";
        $ogurl="https://youandworld.am/".app()->getLocale()."/about";
        $ogdesc=trans('lang.abmetaContent');
        
        $this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
		$this->vars = array_add($this->vars, 'ogimage', $ogimage);
		$this->vars = array_add($this->vars, 'ogurl', $ogurl);
		$this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
        
        
        
         $content=view('about_content')->with("abouts", $abouts)->render();
         $this->vars=array_add($this->vars,'content', $content);

      


        return $this->renderOutput();
    }
    public function getAbout(){
        $abouts=$this->ab_rep->get();

        return $abouts;
    }
    


}
