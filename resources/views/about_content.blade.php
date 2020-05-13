


       <h1 class="text-center">{{ trans('lang.about')}}</h1>
			<div class="container-fluid">
         
    			<div class="row">

        @if($abouts)
                                         @php
                                          $locale = app()->getLocale();

                                        @endphp
                                         @php   
                                               $al= 'alias_'.$locale;
                                               $keywords='keywords_'.$locale;
                                               $tit='title_'.$locale;
                                               $name='name_'.$locale;
                                               $desc='desc_'.$locale;
                                               $text='text_'.$locale;
                                               $longtext='longtext_'.$locale;

                                        @endphp
          @foreach($abouts as $k=>$about) 
             @if($k==0)
               
                <div class="col-md-6 p-5">
                        <h2 class="text-center ga_title">{{ $about->$name }}</h2>
                          

                                  <img class="img-fluid ga_mainimg w-75 ml-5"  src="{!! asset('numerus')  !!}/images/{{ $about->img }}"  alt="{{ $about->$name }}">
                                                                   
                               
                           
                            <div class="ga_desc">
                                {!!   $about->$longtext !!}
                            </div>

                </div>

             @endif  
           @if($k==1)
               
                <div class="col-md-6 p-5">
                        <h2 class="text-center ga_title">{{ $about->$name }}</h2>
                           
                                  <img class="img-fluid ga_mainimg  w-75 ml-5"  src="{!! asset('numerus')  !!}/images/{{ $about->img }}"  alt="{{ $about->$name }}">
                                                                   
                               
                      
                            <div class="ga_desc ga_cat_title">
                                {!!
                                  $about->$longtext !!}<br><a href="{{ url($about->link) }}" target="_blank" title="{!! $about->name !!}" >{!! $about->$name !!}</a>
                                  
                            </div>

                </div>

             @endif
         @endforeach
      @endif  
       </div>
  	



			{{-- form --}}
    <div class="p-5  text-center">

                  <h2 class="mb-4 text-center ga_title">{{ trans('lang.sendmessage') }}</h2>
                  <form action="{{ url('/contact') }}" method="post" >
                    <div class="form-group">
                      <label class="my-2 ga_desc">{{ trans('lang.name') }}</label>
                      <input class="form-control" type="text" name="name" placeholder="{{ trans('lang.yourname') }}" >
                    </div>
                    <div class="form-group">
                      <label class="my-2 ga_desc">{{ trans('lang.email') }}</label>
                      <input class="form-control" type="email" name="email" placeholder="{{ trans('lang.youremail') }}" >
                    </div>
                     <div class="form-group">
                      <label class="my-2 ga_desc">{{ trans('lang.tel') }}</label>
                      <input class="form-control" type="number" name="number" placeholder="+374 ...."  >
                    </div>
                    <div class="row form-group">
                      <div class="col-md-12">
                         <label for="message ga_desc">{{ trans('lang.subject') }}</label>
                        <textarea name="text" id="text" cols="30" rows="10" class="form-control" placeholder="{{ trans('lang.details') }}"></textarea>
                      </div>
                    </div>
                 
                   
                    {{ csrf_field() }}
                    <div class="text-center ga_button">
                      <input class="btn" type="submit" value="{{ trans('lang.send') }}">
                    </div>
                    
                  </form>
    </div>
</div>
<script type="text/javascript">
var infolinks_pid = 3197902;
var infolinks_wsid = 0;
</script>
<script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>
