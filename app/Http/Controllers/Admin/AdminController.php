<?php

namespace Numerus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Numerus\Http\Controllers\Controller;

use Numerus\Repositories\MenusRepository;
use Auth;

class AdminController extends \Numerus\Http\Controllers\Controller
{
    //

    protected $a_rep;
    protected $user;
    protected $template;

    protected $content= FALSE;

    protected $title;
    protected $menu;
    protected $vars;
    public function __construct(){

      $this->middleware(function ($request, $next) {
            $this->user=Auth::user();
            if(!$this->user){
              abort(403);
            }
         return $next($request);
      });
  	  
     } 

        protected function renderOutput(){

   $this->vars=array_add($this->vars,'title', $this->title);

 $menu=$this->getMenu();
 $navigation=view('admin.navigation')->with('menu',$menu)->render();
 $this->vars=array_add($this->vars, 'navigation', $navigation);
 if($this->content){
 	$this->vars=array_add($this->vars, 'content', $this->content);
 }
 $footer=view('admin.footer')->render();
   $this->vars=array_add($this->vars,'footer', $footer);
	return view($this->tamplate)->with($this->vars);
   }




    public function getMenu(){
      
          return \Menu::make('adminMenu', function($menu){
    
                    $menu->add('Հոդվածներ', 'admin/adminarticles');
                    $menu->add('Աֆորզիմներ', 'admin/adminaphorisms');
                    $menu->add('Պատկերասրահ', 'admin/admingallerys');
                    $menu->add('Բանաստեղծություններ', 'admin/adminpoems');
                    $menu->add('Մենյու', 'admin/articlesController');
                    $menu->add('Օգտատերեր', 'admin/articlesController');
                    $menu->add('Պրեվիլիգիի', 'admin/articlesController');
                
                });    

       }






   }
