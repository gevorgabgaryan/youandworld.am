<?php

namespace Numerus\Http\Controllers\Admin;

use Gate;
use Numerus\Http\Requests;
use Numerus\Http\Requests\GalleryRequest;
use Numerus\Http\Controllers\Controller;
use Numerus\Repositories\GallerySliderRepository;
use Numerus\Categories;
use Numerus\GallerySlider;

class GalleryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(GallerySliderRepository $gs_rep){
     parent::__construct();
 
  
        $this->middleware(function ($request, $next) {
      
        if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
        abort(403);
        }
        return $next($request);

        });
 
     $this->gs_rep=$gs_rep;

    $this->tamplate='admin.gallery'; 
     
   }
  
    public function index()
    {
        //
        $this->title="Պատկերասրահ";



        $galleryslider= $this->getGallerySlider();

        $content = view('admin.gallery_content')->with('galleryslider', $galleryslider)->render();

        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();



    }


    public function getGallerySlider(){
        $galleryslider=$this->gs_rep->get();
      
        return $galleryslider;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


      
          if(Gate::denies('save', new \Numerus\GallerySlider)){
             abort(403);
            
          }



              

      
              $this->title="Պատկերասրահի  վահանակ";
  

              $content = view('admin.gallery_create_content')->render();

              $this->vars = array_add($this->vars, 'content', $content);

              return $this->renderOutput();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {


  
        $result=$this->gs_rep->addGallery($request);
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
    public function edit(GallerySlider $admingallery)
    {
        //



          if(Gate::denies('edit', new Galleryslider)){
             abort(403);
            
          }
         

            
            $this->title="Խմբագրում";
            $content = view('admin.gallery_create_content')->with([ 'galleryslide'=>$admingallery])->render();

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
 public function update(GalleryRequest $request,GallerySlider $admingallery)
    {
        //

        $result=$this->gs_rep->updateGallery($request, $admingallery);
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
    public function destroy(GallerySlider $admingallery)
    {
         $result=$this->gs_rep->deleteGallery($admingallery);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

    }
}
