<?php

namespace Numerus\Repositories;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Intervention\Image\Facades\Image;
use Numerus\Galleryslider;
use Numerus\User;
use Config;
 use Illuminate\Support\Facades\Gate;


class GallerySliderRepository extends Repository {
	
	public function __construct(Galleryslider $galleryslider){
		$this->model= $galleryslider;
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


	    public function addGallery($request){
	   
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
                $img=Image::make($image)->fit(1000,700);;
                $img->save(base_path().'/numerus/images/'.$obj->path);

        }
   
          $data['img']=$str.'.jpg';
            $tr = new GoogleTranslate();
       
        $data['title_hy']=$data['title'];
        $data['keywords_hy']='յուրօրինակ նկարներ պատկերասրահ'.str_random(8);
        $data['alias_hy']=str_random(10);
        $data['desc_hy']='յուրօրինակ նկարներ պատկերասրահ'.str_random(8);
        $tr->setTarget('ru'); 
        $data['title_ru']=$tr->translate($data['title']);
        $data['keywords_ru']='Галерея оригинальных картин'.str_random(8);
        $data['alias_ru']=str_random(10);
        $data['desc_ru']='Галерея оригинальных картин ';
        $tr->setTarget('en'); 
        $data['title_en']=$tr->translate($data['title']);
        $data['keywords_en']='original pictures gallery '.str_random(8);
        $data['alias_en']=str_random(10);
        $data['desc_en']='original pictures gallery';
    

            $this->model->fill($data);
       
  
        if($this->model->save()){
                    return ['status'=>'Պահպանվել է'];
        }
            }
            
    }
 public function updateGallery( $request, Galleryslider $admingallery){


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
        if($result->id != $admingallery->id){
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
    
        $admingallery->fill($data);
       
  
        if($admingallery->update()){
                    return ['status'=>'Փոխվել  է'];
        }      
    }

   public function deleteGallery($admingallery){
     if(Gate::denies('destroy', $admingallery)){
        abort(403);
     }

   
      if($admingallery->delete()){
                    return ['status'=>'Ջնջվել է'];
        }  
   }
}