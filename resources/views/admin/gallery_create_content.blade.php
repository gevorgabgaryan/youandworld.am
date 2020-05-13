<div class="container">

  {!! Form::open(['action'=>(isset($galleryslide->id)) ?[ 'Admin\GalleryController@update', 'gallery'=>$galleryslide->alias_hy]: ['Admin\GalleryController@store'],   'class'=>'contact-form]', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
<ul class="list-unstyled">
  
  <li class="text-field">
    <span class="label">Վերնագիր</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::text('title', isset($galleryslide->title_hy)? $galleryslide->title_hy : old('title'), [ 'class'=>'form-control',
         'placeholder'=>'Վերնագիր']) !!}
       </div>
  </li>
   <li class="text-field">
    <span class="label">Ալյաս</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::text('alias', isset($galleryslide->alias_hy)? $galleryslide->alias_hy : old('alias'), [ 'class'=>'form-control',
         'placeholder'=>'Ալյաս', 'value'=>'Յուրօրրինակ']) !!}
       </div>
  </li>
     <li class="text-field">
 
    <div class="input-prepend">
    {!! Form::text('id', isset($galleryslide->id)? $galleryslide->id : "", [ 'hidden'=>'true']) !!}
       </div>
  </li>
    <li class="text-field">
 
    <div class="input-prepend">
    {!! Form::text('id', isset($galleryslide->id)? $galleryslide->id : "", [ 'hidden'=>'true', 'value'=>'Յուրօրրինակ']) !!}
       </div>
  </li>
   <li class="text-field">
    <span class="label">Նկարագրություն</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('desc', isset($galleryslide->desc_hy)? $galleryslide->desc_hy : old('desc'), [ 'class'=>'form-control',
         'placeholder'=>'Նկարագրություն','value'=>'Յուրօրրինակ']) !!}
       </div>
  </li>
    <li class="text-field">
    <span class="label">Բանալի բառեր</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('keywords', isset($galleryslide->keywords_hy)? $galleryslide->keywords_hy : old('keywords'), [ 'class'=>'form-control',
         'placeholder'=>'Բանալի բառեր','value'=>'Յուրօրրինակ']) !!}
       </div>
  </li>
  
   @if(isset($galleryslide->img))
  <li class="textarea-field">
     <label >
       <span class="label">Նկար</span>
     </label>

     {!!  Html::image('numerus/images/'.$galleryslide->img, '',  ['width'=>'400', 'height'=>'200']) !!}

      {!! Form::hidden('old_images',$galleryslide->img )  !!}
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

 
  @if(isset($galleryslide->alias_hy))
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