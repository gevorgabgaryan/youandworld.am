<div class="container">

  {!! Form::open(['action'=>(isset($article->id)) ?[ 'Admin\ArticlesController@update', 'article'=>$article->alias_hy]: ['Admin\ArticlesController@store'],   'class'=>'contact-form]', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
<ul class="list-unstyled">
  
  <li class="text-field">
    <span class="label">Վերնագիր</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::text('title', isset($article->title_hy)? $article->title_hy : old('title'), [ 'class'=>'form-control',
         'placeholder'=>'Վերնագիր']) !!}
       </div>
  </li>
   <li class="text-field">
    <span class="label">Ալյաս</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::text('alias', isset($article->alias_hy)? $article->alias_hy : old('alias'), [ 'class'=>'form-control',
         'placeholder'=>'Ալյաս']) !!}
       </div>
  </li>
    <li class="text-field">
 
    <div class="input-prepend">
    {!! Form::text('id', isset($article->id)? $article->id : "", [ 'hidden'=>'true']) !!}
       </div>
  </li>
   <li class="text-field">
    <span class="label">Նկարագրություն</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('desc', isset($article->desc_hy)? $article->desc_hy : old('desc_hy'), [ 'class'=>'form-control',
         'placeholder'=>'Նկարագրություն']) !!}
       </div>
  </li>
    <li class="text-field">
    <span class="label">Բանալի բառեր</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('keywords', isset($article->keywords_hy)? $article->keywords_hy : old('keywords'), [ 'class'=>'form-control',
         'placeholder'=>'Բանալի բառեր']) !!}
       </div>
  </li>
   <li class="text-field">
    <label for="">
      <span class="label">Տեքստ</span>
    </label>
    

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('text', isset($article->text_hy)? $article->text_hy : old('text'), [ 'class'=>'form-control',
         'placeholder'=>'Տեքստ']) !!}
       </div>
  </li>

   @if(isset($article->img))
  <li class="textarea-field">
     <label >
       <span class="label">Նկար</span>
     </label>

     {!!  Html::image('numerus/images/'.$article->img, '',  ['width'=>'400', 'height'=>'200']) !!}

      {!! Form::hidden('old_images',$article->img )  !!}
  </li>
   @endif
    <li class="textarea-field">
     <label >
       <span class="label">Նկար</span>
     </label>
     {!! Form::file('img', old('img'),[
     'class'=>'filestyle', 'data-buttonText'=>'Atach image', 'placeholder'=>'No Image', 'type'=>'file', 'alt'=>'IMG'

    ]) !!}
  </li>
    <li class="textarea-field">
     <label >
       <span class="label">Տեսակ</span>
     </label>
     {!!  Form::select('category_id', $categories, isset($article->category_id)?$article->category_id : '') !!}

     
  </li>
  @if(isset($article->alias_hy))
        <input name="_method" type="hidden" value="PUT">
  @endif
  <li>
    {!! Form::submit('Save', [
     'class'=>'btn btn-primary', 'type'=>'submit' ])!!}

  </li>
</ul>
<script type="text/javascript">
  CKEDITOR.replace('editor')
</script>

{{ Form::close()}}  
</div>