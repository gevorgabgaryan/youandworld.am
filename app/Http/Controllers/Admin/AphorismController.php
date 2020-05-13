<?php

namespace Numerus\Http\Controllers\Admin;

use Gate;
use Numerus\Http\Requests;
use Numerus\Http\Requests\AphorismRequest;
use Numerus\Http\Controllers\Controller;
use Numerus\Repositories\AphorismsRepository;
use Numerus\Categories;
use Numerus\Aphorisms;

class AphorismController extends AdminController
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(aphorismsRepository $a_rep, AphorismsRepository $ap_rep){
     parent::__construct();
     
  
        $this->middleware(function ($request, $next) {
      
        if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
        abort(403);
        }
        return $next($request);

        });
 
     $this->a_rep=$a_rep;
    $this->ap_rep=$ap_rep;

    $this->tamplate='admin.aphorisms'; 
     
   }
  
    public function index()
    {
        //
        $this->title="Հոդվածների  վահանակ";



        $aphorisms=$this->getAphorisms();

        $content = view('admin.aphorisms_content')->with('aphorisms', $aphorisms)->render();

        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();



    }


     public function getaphorisms(){
        $aphorisms=$this->a_rep->get("*");

        return $aphorisms;


     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

      
          if(Gate::denies('save', new \Numerus\Aphorisms)){
             abort(403);
            
          }

          

      
              $this->title="Հոդվածների  վահանակ";
     
       

     

         $content = view('admin.aphorisms_create_content')->render();

         $this->vars = array_add($this->vars, 'content', $content);

         return $this->renderOutput();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AphorismRequest $request)
    {
   
        $result=$this->a_rep->addAphorisms($request);
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
    public function edit(Aphorisms $adminaphorism)
    {
        //

       

          if(Gate::denies('edit', new Aphorisms)){
             abort(403);
            
          }
 
            $this->title="Խմբագրում";
            $content = view('admin.aphorisms_create_content')->with(['aphorism'=>$adminaphorism])->render();

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
    public function update(AphorismRequest $request,Aphorisms $adminaphorism)
    {
        //
      
        $result=$this->a_rep->updateAphorism($request, $adminaphorism);
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
    public function destroy(Aphorisms $adminaphorism)
    {
         $result=$this->ap_rep->deleteArticle($adminaphorism);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

    }
}
