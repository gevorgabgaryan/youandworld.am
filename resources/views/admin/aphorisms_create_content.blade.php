<div class="container">

  {!! Form::open(['action'=>(isset($aphorism->id)) ?[ 'Admin\AphorismController@update', 'aphorism'=>$aphorism->alias_hy]: ['Admin\AphorismController@store'],   'class'=>'contact-form]', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
<ul class="list-unstyled">
  
  <li class="text-field">
    <span class="label">Վերնագիր</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::text('title', isset($aphorism->title_hy)? $aphorism->title_hy : old('title'), [ 'class'=>'form-control',
         'placeholder'=>'Վերնագիր']) !!}
       </div>
  </li>
   <li class="text-field">
    <span class="label">Ալյաս</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::text('alias', isset($aphorism->alias_hy)? $aphorism->alias_hy : old('alias'), [ 'class'=>'form-control',
         'placeholder'=>'Ալյաս']) !!}
       </div>
  </li>
     <li class="text-field">
 
    <div class="input-prepend">
    {!! Form::text('id', isset($aphorism->id)? $aphorism->id : "", [ 'hidden'=>'true']) !!}
       </div>
  </li>
    <li class="text-field">
 
    <div class="input-prepend">
    {!! Form::text('id', isset($aphorism->id)? $aphorism->id : "", [ 'hidden'=>'true']) !!}
       </div>
  </li>
   <li class="text-field">
    <span class="label">Նկարագրություն</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('desc', isset($aphorism->desc_hy)? $aphorism->desc_hy : old('desc'), [ 'class'=>'form-control',
         'placeholder'=>'Նկարագրություն']) !!}
       </div>
  </li>
    <li class="text-field">
    <span class="label">Բանալի բառեր</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('keywords', isset($aphorism->keywords_hy)? $aphorism->keywords_hy : old('keywords'), [ 'class'=>'form-control',
         'placeholder'=>'Բանալի բառեր']) !!}
       </div>
  </li>


   @if(isset($aphorism->img))
  <li class="textarea-field">
     <label >
       <span class="label">Նկար</span>
     </label>

     {!!  Html::image('numerus/images/'.$aphorism->img, '',  ['width'=>'400', 'height'=>'200']) !!}

      {!! Form::hidden('old_images',$aphorism->img )  !!}
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

  @if(isset($aphorism->alias_hy))
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