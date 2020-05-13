<?php

namespace Numerus\Policies;

use Numerus\User;
use Numerus\Galleryslider;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

        public function save(User $user){
     return $user->canDo('ADD_ARTICLES');
    }
     public function edit(User $user){
     return $user->canDo('UPDATE_ARTICLES');
    }
    public function destroy(User $user){

     
     return ($user->canDo('DELETE_ARTICLES') );
    }
}
