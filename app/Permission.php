<?php

namespace Numerus;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
            public function roles(){

        return $this->belongsToMany('Numerus\Role', 'permission_role');

}
}
