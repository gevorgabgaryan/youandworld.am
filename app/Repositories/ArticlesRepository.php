<?php

namespace Numerus\Repositories;
use Intervention\Image\Facades\Image;
use Numerus\Articles;
use Numerus\User;
use Config;
use Stichoza\GoogleTranslate\GoogleTranslate;
 use Illuminate\Support\Facades\Gate;
class ArticlesRepository extends Repository {
    
    public function __construct(Articles $articles){
        $this->model= $articles;


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

    public function addArticle($request){
        if(Gate::denies('save', $this->model)){
            aboert(403);
        }
        $data=$request->except('_token', 'image');
        if(empty($data)){
            return array('error'=>"Տվյալներ չկա");
        }
        if(empty($data['alias'])){
            $data['alias_hy']=$this->transliterate($data['title']);
        }

        if($this->one($data['alias'], FALSE)){
            $request->merge(array('alias_hy'=>$data['alias']));

         $request->flash();
         return ['error'=>"Զբաղված է"] ;  
        }

        if($request->hasFile('img')){
            $image=$request->file('img');
            
            if($image->isValid()){
                $str=str_random(8);
                $obj= new \stdClass;
                $obj->path=$str.'.jpg';
                $img=Image::make($image)->fit(1200,800);;
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
       
  
        if($request->user()->articles()->save($this->model)){
                    return ['status'=>'Պահպանվել է'];
        }
            }
            
    }
  public function updateArticle( $request, Articles $adminarticle){
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
        
        $result=$this->oneAdmin($data['alias'], FALSE);
          if($result->id != $adminarticle->id){
            $request->merge(array('alias_hy'=>$data['alias_hy']));

         $request->flash();
         return ['error'=>"Զբաղված է"] ;  
        }

        if($request->hasFile('img')){
            $image=$request->file('img');
            
            if($image->isValid()){
                $str=str_random(8);
                $obj= new \stdClass;
                $obj->path=$str.'.jpg';
                $img=Image::make($image)->fit(1200,800);
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




        $adminarticle->fill($data);
       

        if($adminarticle->update()){
                    return ['status'=>'Փոխվել  է'];
        }      
    }


   public function deleteArticle($adminarticle){
     if(Gate::denies('destroy', $adminarticle)){
        abort(403);
     }

     $adminarticle->comment()->delete();
      if($adminarticle->delete()){
                    return ['status'=>'Ջնջվել է'];
        }  
   }
}