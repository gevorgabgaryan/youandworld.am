<?php

namespace Numerus\Http\Controllers\Admin;

use Gate;
use Numerus\Http\Requests;
use Numerus\Http\Requests\ArticleRequest;
use Numerus\Http\Controllers\Controller;
use Numerus\Repositories\ArticlesRepository;
use Numerus\Categories;
use Numerus\Articles;

class ArticlesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(ArticlesRepository $a_rep){
     parent::__construct();
     
  
        $this->middleware(function ($request, $next) {
      
        if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
        abort(403);
        }
        return $next($request);

        });
 
     $this->a_rep=$a_rep;

    $this->tamplate='admin.articles'; 
     
   }
  
    public function index()
    {
        //
        $this->title="Հոդվածների  վահանակ";



        $articles= $this->getArticles();

        $content = view('admin.articles_content')->with('articles', $articles)->render();

        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();



    }


     public function getArticles(){
        $articles=$this->a_rep->get("*");

        return $articles;


     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


      
          if(Gate::denies('save', new \Numerus\Articles)){
             abort(403);
            
          }



              

      
              $this->title="Հոդվածների  վահանակ";
            $categories= Categories::select(['title_hy', 'alias_hy', 'parent_id','id'])->get(); 

       

            $list=array();
         
            foreach($categories as $category){
      
            $list[$categories->where('id', $category->parent_id)->first()][$category->id]=$category->title;


                   
               
            } 

                 $content = view('admin.articles_create_content')->with('categories', $list)->render();

        $this->vars = array_add($this->vars, 'content', $content);

       return $this->renderOutput();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
  
        $result=$this->a_rep->addArticle($request);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

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
    public function edit(Articles $adminarticle)
    {
        //
       

         if(Gate::denies('edit', new Articles)){
             abort(403);
            
          }
           $categories= Categories::select(['title_hy', 'alias_hy', 'parent_id','id'])->get(); 

       

            $list=array();
         
            foreach($categories as $category){
      
            $list[$categories->where('id', $category->parent_id)->first()][$category->id]=$category->title;


                   
               
            }
            
            $this->title="Խմբագրում";
            $content = view('admin.articles_create_content')->with(['categories'=>$list, 'article'=>$adminarticle])->render();

            $this->vars = array_add($this->vars, 'content', $content);

             return $this->renderOutput();
      

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request,Articles $adminarticle)
    {
        //
     
     
        $result=$this->a_rep->updateArticle($request, $adminarticle);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $adminarticle)
    {
         $result=$this->a_rep->deleteArticle($adminarticle);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

    }
}
