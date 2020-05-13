<?php

namespace Numerus\Providers;
use Numerus\Articles;
use Numerus\Galleryslider;
use Numerus\Aphorisms;
use Numerus\Poem;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Numerus\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
 
        parent::boot();

       Route::bind('adminarticles', function ($value) {
       
        Articles::where('alias_hy', $value )->first() ;
         
       });
       Route::bind('admingallerys', function ($value) {
        Galleryslider::where('alias_hy', $value )->first() ;
         
       });
   
       Route::bind('adminaphorisms', function ($value) {
        Aphorisms::where('alias_hy', $value )->first() ;
         
       });

       Route::bind('adminpoems', function ($value) {
        Poem::where('alias_hy', $value )->first() ;
         
       });
   
   
        
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();



        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
