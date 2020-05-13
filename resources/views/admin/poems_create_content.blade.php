<div class="container">

  {!! Form::open(['action'=>(isset($poem->id)) ?[ 'Admin\PoemsController@update', 'poem'=>$poem->alias_hy]: ['Admin\PoemsController@store'],   'class'=>'contact-form]', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
<ul class="list-unstyled">
  
  <li class="text-field">
    <span class="label">Վերնագիր</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::text('title', isset($poem->title_hy)? $poem->title_hy : old('title'), [ 'class'=>'form-control',
         'placeholder'=>'Վերնագիր']) !!}
       </div>
  </li>
   <li class="text-field">
    <span class="label">Ալյաս</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::text('alias', isset($poem->alias_hy)? $poem->alias_hy : old('alias'), [ 'class'=>'form-control',
         'placeholder'=>'Ալյաս']) !!}
       </div>
  </li>
    <li class="text-field">
 
    <div class="input-prepend">
    {!! Form::text('id', isset($poem->id)? $poem->id : "", [ 'hidden'=>'true']) !!}
       </div>
  </li>
   <li class="text-field">
    <span class="label">Նկարագրություն</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('desc', isset($poem->desc_hy)? $poem->desc_hy : old('desc'), [ 'class'=>'form-control',
         'placeholder'=>'Նկարագրություն']) !!}
       </div>
  </li>
    <li class="text-field">
    <span class="label">Բանալի բառեր</span>

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('keywords', isset($poem->keywords_hy)? $poem->keywords_hy : old('keywords'), [ 'class'=>'form-control',
         'placeholder'=>'Բանալի բառեր']) !!}
       </div>
  </li>
   <li class="text-field">
    <label for="">
      <span class="label">Տեքստ</span>
    </label>
    

    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
    {!! Form::textarea('text', isset($poem->text_hy)? $poem->text_hy : old('text'), [ 'class'=>'form-control',
         'placeholder'=>'Տեքստ']) !!}
       </div>
  </li>

   @if(isset($poem->img))
  <li class="textarea-field">
     <label >
       <span class="label">Նկար</span>
     </label>

     {!!  Html::image('numerus/images/'.$poem->img, '',  ['width'=>'400', 'height'=>'200']) !!}

      {!! Form::hidden('old_images',$poem->img )  !!}
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

  @if(isset($poem->alias_hy))
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