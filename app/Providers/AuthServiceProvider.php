<?php

namespace Numerus\Providers;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Numerus\Articles;
use Numerus\Policies\ArticlePolicy;
use Numerus\Galleryslider;
use Numerus\Policies\GalleryPolicy;
use Numerus\Aphorisms;
use Numerus\Policies\AphorismsPolicy;
use Numerus\Poem;
use Numerus\Policies\PoemsPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       Articles::class=>ArticlePolicy::class,
       Galleryslider::class=>GalleryPolicy::class,
       Aphorisms::class=>AphorismsPolicy::class,
       Poem::class=>PoemsPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
   public function boot(GateContract $gate)
{
    $this->registerPolicies($gate);

   Gate::define('VIEW_ADMIN', function($user){
        return $user->canDo('VIEW_ADMIN', FALSE);
    });
     Gate::define('VIEW_ADMIN_ARTICLES', function($user){
        return $user->canDo('VIEW_ADMIN_ARTICLES', FALSE);
    });

    //
}
}
