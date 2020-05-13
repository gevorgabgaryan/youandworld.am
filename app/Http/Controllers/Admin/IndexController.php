<?php

namespace Numerus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Numerus\Http\Controllers\Controller;
 use Illuminate\Support\Facades\Gate;


class IndexController extends AdminController
{
    //

     public function __construct(){
     parent::__construct();
  
$this->middleware(function ($request, $next) {

if(Gate::denies('VIEW_ADMIN')) {
abort(404);
}
return $next($request);

});
    $this->tamplate='admin.index';    
   }


public function index(){

$this->title="Ղեկավարման վահանակ";

return $this->renderOutput();
}


}
