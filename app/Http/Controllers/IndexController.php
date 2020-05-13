<?php

namespace Numerus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


use Numerus\Repositories\ArticlesRepository;

use Numerus\Repositories\AboutsRepository;

use Config;

use Stichoza\GoogleTranslate\GoogleTranslate;
class IndexController extends SiteController
{
    
   public function __construct(ArticlesRepository $a_rep, AboutsRepository $ab_rep){
     parent::__construct(new \Numerus\Repositories\MenusRepository(new \Numerus\Menu), new \Numerus\Repositories\AboutsRepository(new \Numerus\Abouts));

    $this->a_rep=$a_rep;
    $this->ab_rep=$ab_rep;
     $this->tamplate='Index';
   }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $tr = new GoogleTranslate();
        $tr->setTarget(app()->getLocale());
  
        $articles=$this->getArticles();
        $pagetitle="home";
        $this->vars = array_add($this->vars, 'pagetitle', $pagetitle);
  
        $content=view('content')->with(['articles'=>$articles,'pagetitle'=>$pagetitle,'tr'=>$tr])->render();
        $this->vars=array_add($this->vars,'content', $content);

        




         $asideArticles=$this->getAsideArticles();
         $abouts=$this->getAbout();

     
         $this->contentRightBar=view("indexBar")->with(["abouts"=>$abouts, "asideArticles"=>$asideArticles])->render();
        return $this->renderOutput();
    }
    protected function getArticles(){
        $article=$this->a_rep->get("*", FALSE,  TRUE);;
    
        return $article;

     }
    protected function getAsideArticles(){
        $asidearticle=$this->a_rep->get(['title_hy','title_ru','title_en', 'created_at','img', 'alias_hy','alias_ru','alias_en'], Config::get('settings.home_port_count'));
        return $asidearticle;

     }


     public function getAbout(){
        $abouts=$this->ab_rep->get();

        return $abouts;
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
