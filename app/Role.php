<?php

namespace Numerus;

use Illuminate\Database\Eloquent\Model;
use Numerus\Permissions;
class Role extends Model
{
    //

       public function users(){

        return $this->belongsToMany('Numerus\User', 'role_user');

    }
        public function perms(){

        return $this->belongsToMany('Numerus\Permission');

    }
}
