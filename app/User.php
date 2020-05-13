<?php

namespace Numerus;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Numerus\Permission;
class User extends Authenticatable
{
    use Notifiable;
    public function getRouteKeyName()
{
    return 'alias';
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ]; 
    public function articles(){

        return $this->hasMany('Numerus\Articles');

    }
        public function gallery(){

        return $this->hasMany('Numerus\Galleryslider');

    }
      public function roles(){

        return $this->belongsToMany('Numerus\Role', 'role_user');

    }
public function canDo($permission, $require=FALSE){
    if (is_array($permission)){
foreach($permission as $permName){
        $permName=$this->canDo($permName);
        if($permName && !$require){
            return TRUE;
        }else if(!$permName && $require){
            return FALSE;
        }
        

}

return $require;
}else{

    foreach($this->roles as $role){
        foreach($role->perms as $perm){
           if(str_is($permission,$perm->name)){
                return TRUE;
           }
            
    }
}

}

}


public function hasRole($name, $require=FALSE){
    if (is_array($name)){
      foreach($name as $roleName){
        $hasRole=$this->hasRole($roleName);
        if($hasRole && !$require){
            return TRUE;
        }else if(!$hasRole && !$require){
            return FALSE;
        }
  }
  return $require;
}else{

    foreach($this->roles  as $role){
    
           if($role->name==$name){
                return TRUE;
           }
            
    
}

}

}
}