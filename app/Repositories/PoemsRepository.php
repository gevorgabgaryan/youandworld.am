<?php

namespace Numerus\Repositories;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Intervention\Image\Facades\Image;
use Numerus\Poem;
use Numerus\User;
use Config;
 use Illuminate\Support\Facades\Gate;
class PoemsRepository extends Repository {
    
    public function __construct(Poem $Poem){
        $this->model= $Poem;


    }

        public function get($select = "*", $take = FALSE, $pagination = FALSE, $where = False) {
        $builder = $this->model->select($select)->orderByRaw("created_at DESC");

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
        public function getRand($select = "*") {
        $builder = $this->model->select($select)->orderByRaw('RAND()');

        
        return $builder->get();

    }
    public function one($alias, $attr=array()){
        $article=parent::one($alias, $attr);
        if($article && !empty($attr)){
            $article->load('comment');
            $article->comment->load('user');
        }

        return $article;

    }

    public function addPoem($request){
        if(Gate::denies('save', $this->model)){
            aboert(403);
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
                $img=Image::make($image)->fit(800,400);;
                $img->save(base_path().'/numerus/images/'.$obj->path);

        }
   
          $data['img']=$str.'.jpg';
        $tr = new GoogleTranslate(); 
      
    
        $data['title_hy']=$data['title'];
        $data['keywords_hy']=$data['keywords'];
        $data['text_hy']=$data['text'];
        $data['alias_hy']=$data['alias'];
        $data['desc_hy']=$data['desc'];
        
        $entitle=$tr->translate($data['title']);
        $enkeywords=$tr->translate($data['keywords']);
        $entext=$tr->translate($data['text']);
        $enalias=$tr->translate($data['alias']);
        $endesc=$tr->translate($data['desc']); 
        $tr->setTarget('ru'); 
        $data['title_ru']=$tr->translate($data['title']);
        $data['keywords_ru']=$tr->translate($data['keywords']);
        $data['text_ru']=$tr->translate($data['text']);
        $data['alias_ru']=$tr->translate($data['alias']);
        $data['desc_ru']=$tr->translate($data['desc']);
        $tr->setTarget('en'); 
        $data['title_en']=$tr->translate($data['title']);
        $data['keywords_en']=$tr->translate($data['keywords']);
        $data['text_en']=$tr->translate($data['text']);
        $data['alias_en']=$tr->translate($data['alias']);
        $data['desc_en']=$tr->translate($data['desc']);

            $this->model->fill($data);
       
  
        if($this->model->save()){
                    return ['status'=>'Պահպանվել է'];
        }
            }
            
    }
  public function updatePoem( $request, Poem $adminpoem){
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
        if($result->id != $adminpoem->id){
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
        $data['text_hy']=$data['text'];
        $data['alias_hy']=$data['alias'];
        $data['desc_hy']=$data['desc'];
        
        $entitle=$tr->translate($data['title']);
        $enkeywords=$tr->translate($data['keywords']);
        $entext=$tr->translate($data['text']);
        $enalias=$tr->translate($data['alias']);
        $endesc=$tr->translate($data['desc']); 
        $tr->setTarget('ru'); 
        $data['title_ru']=$tr->translate($data['title']);
        $data['keywords_ru']=$tr->translate($data['keywords']);
        $data['text_ru']=$tr->translate($data['text']);
        $data['alias_ru']=$tr->translate($data['alias']);
        $data['desc_ru']=$tr->translate($data['desc']);
        $tr->setTarget('en'); 
        $data['title_en']=$tr->translate($data['title']);
        $data['keywords_en']=$tr->translate($data['keywords']);
        $data['text_en']=$tr->translate($data['text']);
        $data['alias_en']=$tr->translate($data['alias']);
        $data['desc_en']=$tr->translate($data['desc']);
            
        $adminpoem->fill($data);
       
  
        if($adminpoem->update()){
                    return ['status'=>'Փոխվել  է'];
        }      
    }
   

   public function deletePoem($adminpoem){
     if(Gate::denies('destroy', $adminpoem)){
        abort(403);
     }

 
      if($adminpoem->delete()){
                    return ['status'=>'Ջնջվել է'];
        }  
   }
}