<?php

namespace Numerus\Http\Controllers\Admin;

use Gate;
use Numerus\Http\Requests;
use Numerus\Http\Requests\PoemRequest;
use Numerus\Http\Controllers\Controller;
use Numerus\Repositories\PoemsRepository;
use Numerus\Poem;

class PoemsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(PoemsRepository $pm_rep){
     parent::__construct();
     
  
        $this->middleware(function ($request, $next) {
      
        if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
        abort(403);
        }
        return $next($request);

        });
 
     $this->pm_rep=$pm_rep;

    $this->tamplate='admin.poems'; 
     
   }
  
    public function index()
    {
        //
        $this->title="Բանաստեղծություններ  վահանակ";



        $poems= $this->getpoems();



        $content = view('admin.poems_content')->with('poems', $poems)->render();

        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();



    }


     public function getpoems(){
        $poems=$this->pm_rep->get("*");

        return $poems;


     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


      
          if(Gate::denies('save', new \Numerus\Poem)){
             abort(403);
            
          }



              

      
              $this->title="Հոդվածների  վահանակ";
          
       


                 $content = view('admin.poems_create_content')->render();

        $this->vars = array_add($this->vars, 'content', $content);

       return $this->renderOutput();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PoemRequest $request)
    {
   

        $result=$this->pm_rep->addPoem($request);
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
    public function edit(Poem $adminpoem)
    {
        //
       


          if(Gate::denies('edit', new Poem)){
             abort(403);
            
          }
        
            
            $this->title="Խմբագրում";
            $content = view('admin.poems_create_content')->with(['poem'=>$adminpoem])->render();

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
    public function update(poemRequest $request, Poem $adminpoem)
    {
        //
      
        $result=$this->pm_rep->updatePoem($request, $adminpoem);
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
    public function destroy(Poem $adminpoem)
    {
         $result=$this->pm_rep->deletePoem($adminpoem);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

    }
}
