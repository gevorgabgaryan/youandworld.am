<?php

namespace Numerus\Repositories;

use Numerus\Aphorisms;
use Config;
use Intervention\Image\Facades\Image;

use Numerus\User;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Gate;


class AphorismsRepository extends Repository {
	
	public function __construct(Aphorisms $aphorisms){
		$this->model= $aphorisms;
	}
		public function get($select = "*", $take = FALSE, $pagination = FALSE, $where = False) {
		$builder = $this->model->select($select)->orderByRaw("Rand()");

		if ($take) {
			$builder->take($take);
		}
		if ($where) {
			$builder->where($where[0], $where[1]);
		}

		if ($pagination) {
			return $builder->paginate(Config::get('settings.paginate'));
		}

		return $builder->get();

	}
	 public function addAphorisms($request){
	   
        if(Gate::denies('save', $this->model)){
            abort(403);
        }
        $data=$request->except('_token', 'image');

        if(empty($data)){
            return array('error'=>"Տվյալներ չկա");
        }
        if(empty($data['alias'])){
            $data['alias']=$this->transliterate($data['title']);
        }

     

        if($this->one($data['alias'], FALSE)){
            $request->merge(array('alias'=>$data['alias']));

         $request->flash();
         return ['error'=>"Զբաղված է"] ;  
        }

        if($request->hasFile('img')){
            $image=$request->file('img');
            
            if($image->isValid()){
                $str=str_random(8);
                $obj= new \stdClass;
                $obj->path=$str.'.jpg';
                $img=Image::make($image)->fit(800,400);
                $img->save(base_path().'/numerus/images/'.$obj->path);

        }
   
          $data['img']=$str.'.jpg';
          $data['img']=$str.'.jpg';
          $data['img']=$str.'.jpg';
         $tr = new GoogleTranslate();
       
        $data['title_hy']=$data['title'];
        $data['keywords_hy']='Աֆորիզմներ, իմաստուն մտքեր'.str_random(8);
        $data['alias_hy']=str_random(10);
        $data['desc_hy']=str_random(10);
        $tr->setTarget('ru'); 
        $data['title_ru']=$tr->translate($data['title']);
        $data['keywords_ru']='Афоризмы, мудрые мысли'.str_random(8);
        $data['alias_ru']=str_random(10);
        $data['desc_ru']='Афоризмы, мудрые мысли'.str_random(8);
        $tr->setTarget('en'); 
        $data['title_en']=$tr->translate($data['title']);
        $data['keywords_en']='Aphorisms, wise thoughts'.str_random(8);
        $data['alias_en']=str_random(10);
        $data['desc_en']='Aphorisms, wise thoughts'.str_random(8);
    
         $this->model->fill($data);
       
  
        if($this->model->save()){
                    return ['status'=>'Պահպանվել է'];
        }
            }
            
    }
  public function updateAphorism( $request, Aphorisms $adminaphorism){
        if(Gate::denies('edit', $this->model)){
            aboert(403);
        }
         
      
        $data=$request->except('_token', 'image', '_method');
        if(empty($data)){
            return array('error'=>"Տվյալներ չկա");
        }
        if(empty($data['alias'])){
            $data['alias']=$this->transliterate($data['title']);
        }
        $result=$this->one($data['alias'], FALSE);

       $this->one($data['alias'], FALSE);
        if($result->id != $adminaphorism->id){
            $request->merge(array('alias'=>$data['alias']));

         $request->flash();
         return ['error'=>"Զբաղված է"] ;  
        }

        if($request->hasFile('img')){
            $image=$request->file('img');
            
            if($image->isValid()){
                $str=str_random(8);
                $obj= new \stdClass;
                $obj->path=$str.'.jpg';
                $img=Image::make($image)->fit(800,400);
                $img->save(base_path().'/numerus/images/'.$obj->path);

        }
   
          $data['img']=$str.'.jpg';


            }
        $tr = new GoogleTranslate();
        $data['title_hy']=$data['title'];
        $data['keywords_hy']=$data['keywords'];
        $data['alias_hy']=$data['alias'];
        $data['desc_hy']=$data['desc'];
         $tr->setTarget('ru'); 
        $data['title_ru']=$tr->translate($data['title']);
        $data['keywords_ru']=$tr->translate($data['keywords']);
        $data['alias_ru']=$tr->translate($data['alias']);
        $data['desc_ru']=$tr->translate($data['desc']);
        $tr->setTarget('en'); 
        $data['title_en']=$tr->translate($data['title']);
        $data['keywords_en']=$tr->translate($data['keywords']);
        $data['alias_en']=$tr->translate($data['alias']);
        $data['desc_en']=$tr->translate($data['desc']);
         
        $adminaphorism->fill($data);
       
  
        if($adminaphorism->update()){
                    return ['status'=>'Փոխվել  է'];
        }      
    }
   

   public function deleteArticle($adminaphorism){
     if(Gate::denies('destroy', $adminaphorism)){
        abort(403);
     }

  
      if($adminaphorism->delete()){
                    return ['status'=>'Ջնջվել է'];
        }  
   }
}