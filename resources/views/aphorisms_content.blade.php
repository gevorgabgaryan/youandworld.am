   

@if(count($aphorisms)>0)

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
  <div class="col-md-8 offset-md-2">                                     
<h1  class="text-center">{{ trans('lang.aphorism')}}</h1>

<div id="demo" class="carousel slide" data-ride="carousel">


  
  <!-- The slideshow -->
  <div class="carousel-inner">

    @set($i, 1)
            @foreach($aphorisms as $k=>$aphorism)
            @if($k==0)
              <div class="carousel-item active ">
                <a href="{{ route('aphorisms.show', ['alias'=>$aphorism->$al,'locale'=>app()->getLocale()]) }}" title="{{ $aphorism->$tit }}"> 
                <img src="{{ asset('numerus') }}/images/{{ $aphorism->img }}" alt="{{ $aphorism->$tit }}" class="mx-auto w-100 img-fluid" >
               
                    <h4 class="  text-center bg-secondary text-white p-2 ">{{ $aphorism->$tit }}</h4>
                  
            
                </a>
              </div>
             @else

               <div class="carousel-item " >
                <a href="{{ route('aphorisms.show', ['alias'=>$aphorism->$al,'locale'=>app()->getLocale()]) }}" title="{{ $aphorism->desc }}"> 
                <img src="{{ asset('numerus') }}/images/{{ $aphorism->img }}" alt="{{ $aphorism->desc }}" class="mx-auto w-100 img-fluid">
           
                    <h4 class=" text-center bg-secondary text-white p-2 ">
                      {{ $aphorism->$tit }}
                    </h4>
                  
             
                </a>
              </div>

             @endif 
            @set($i,$i+1)
      @endforeach

  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon bg-dark"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon bg-dark"></span>
  </a>
</div>
           <p class="text-center">
                                   <div class="fb-share-button " id="fb-share-button" style="margin-left:47%; margin-bottom:20px;" data-href="http://youandworld.am/{{app()->getLocale()}}/aphorisms/" data-layout="button_count" data-size="large"> <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fyouandworld.am%2F{{app()->getLocale()}}%2Faphorisms%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" title="{{ trans('lang.aphorism')}}">Share</a></div>
                             
                                <div class="sharethis-inline-share-buttons"></div>
                                <!--sub-->
     <form action="{{ route('subscribe') }}" method="post" class="ga_sub pt-5">
                                         <h2 >{{ trans('lang.subt') }} </h2> 
                                        <input type="text" class="form-control form-email text-center" name="email" id="email" placeholder="{{ trans('lang.youremail') }} ">
                                            {{ csrf_field() }}
                                        <button type="submit" class="btn ">{!! trans('lang.sub')!!}</button>
                                    
                                         @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block " id="ga_sub_success" >
                                          <button type="button" class="close" data-dismiss="alert">×</button> 
                                          <strong>{!! $message !!}</strong>
                                          <script type="text/javascript">
                                                  setTimeout(()=>{
                                                    document.querySelector('#ga_sub_success').style.display="none"
                                                  }, 3000)
                                                </script>
                                         </div>
                                         @endif


                                        @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block " id="ga_sub_error" >
                                          <button type="button" class="close" data-dismiss="alert">×</button> 
                                                <strong>{!! $message !!}</strong>
                                                <script type="text/javascript">
                                                  setTimeout(()=>{
                                                    document.querySelector('#ga_sub_error').style.display="none"
                                                  }, 3000)
                                                </script>
                                        </div>
                                        @endif
                        </form>  
                            </p>


  <hr>
   <article class="ga_main_article pt-5" >

     <h3 class="text-center ga_fb">{{ trans('lang.art') }}</h3>
    @foreach($randomArticle as $k=>$randomArticle)



       @if($k<4)              
     
       




                         
                                <h2 class="text-center ga_cat_title" >
                                  <a href="{{ route('articles.show', ['alias'=>$randomArticle->$al,'locale'=>app()->getLocale()]) }}" title="{{ $randomArticle->desc }}" >{{ $randomArticle-> $tit }}</a>
                                </h2>
                                 <a href="{{  route('articles.show', ['alias'=>$randomArticle->$al,'locale'=>app()->getLocale()]) }}"  title="{{ $randomArticle-> $tit }}">
                                       <img src="{{ asset('numerus') }}/images/{{ $randomArticle->img}}"   title="{{ $randomArticle-> $tit}}" alt="{{ $randomArticle->keywords}}" class="img-fluid ga_mainimg"  >
                                  </a>
                         
                               
                     
                            <div class="ga_desc">
                                {!! str_limit($randomArticle->$text, 200)  !!}
                            </div>
                            <p class="text-center ga_button"><a href="{{ route('articles.show', ['alias'=>$randomArticle->$al,'locale'=>app()->getLocale()]) }}" class="btn btn-primary btn-custom" title="{{ $randomArticle-> $tit}}" >{{ Lang::get('lang.read_more') }}</a></p>
                  </article>
                     
        @endif 
      
    @endforeach
     
  <hr>
  <ul class="list-inline list-unstyled">  
    @foreach($items as $item)

  <li class="ga_cat_title list-inline-item ml-2">
  <a href="{{  route($item->path, app()->getLocale()) }}" title="{{ trans('lang'.$item->path) }}">{{ trans('lang.'.$item->path)  }}</a>
 </li>
     @endforeach
</ul>                     


</article>

</div>

        @endif