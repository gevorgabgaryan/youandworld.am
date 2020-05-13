
					<div class="col-md-10 offset-md-1">
  
		
						       @if($aphorism )

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
                          
                                <h1 class="text-center">{{ $aphorism->$tit }}</h1>
                                
                                  <img src="{{ asset('numerus') }}/images/{{ $aphorism->img}}"   title="{{ $aphorism->$tit}}" alt="{{ $aphorism->keywords}}" class="img-fluid w-100" class="ga_mainimg" >
                                
                                <p class="ga_info text-center">
                                     <a class="display-4" href="{{  route('aphorism', app()->getLocale()) }}" target="_blank" title="{{ trans('lang.aphorism')}}">{{ trans('lang.aphorism')}}</a> <br>
                                    
                                    
                                    <i class="icon-calendar3"></i> {{ $aphorism->created_at->format('F d , Y' ) }}   
                                </p>
                      
                        
                                      <p class="text-center">
                                   <div class="fb-share-button " id="fb-share-button" style="margin-left:47%; margin-bottom:20px;" data-href="http://youandworld.am/{{app()->getLocale()}}/aphorisms/{{ $aphorism->$al }}" data-layout="button_count" data-size="large"> <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fyouandworld.am%2F{{app()->getLocale()}}%2Faphorisms%2F{{ $aphorism->$al }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" title="{{ $aphorism->$tit }}">Share</a></div>
                             
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

    @foreach($abouts as $k=>$about)
     @if($k==2 )

<div class="row">
          <div class="col-md-6 p-5">
                    
                           
   <a href="{{ url($about->link) }}" target="_blank" title="{!! $about->$name !!}">  <img class="img-fluid "  src="{!! asset('numerus')  !!}/images/{{ $about->img }}"  alt="{{ $about->$name }}"></a>
                                
                                                                    
                            
                            
                       
         </div>
           <div class="col-md-6 p-5 ga_cat_title">
                    
                           

                                <a href="{{ url($about->link) }}" target="_blank"  title="{!! $about->$name !!}">{!! $about->$name !!}</a>{{ trans('lang.sunnysponsor') }}<br>
                                <a href="{{ url($about->$al) }}" target="_blank" title="{!! $about->$name !!}">{!! $about->$text !!}</a><br>
                                 <a href="{{ url($about->$longtext) }}" target="_blank" title="{!! $about->$name !!}">{{ trans('lang.register') }}</a>
                            
                            
                       
         </div>
</div>    
                          

    @endif

    @endforeach
  <hr>
  

<!-- YouandArticleFooter -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6229763467370402"
     data-ad-slot="1478776355"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>                      

  
   <article class="ga_main_article " >

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
            
                    
        @endif 
      
    @endforeach
       </article> 
  <hr>
  <ul class="list-inline list-unstyled">  
    @foreach($items as $item)

  <li class="ga_cat_title list-inline-item ml-2">
  <a href="{{  route($item->path, app()->getLocale()) }}" title="{{ trans('lang'.$item->path) }}">{{ trans('lang.'.$item->path)  }}</a>
 </li>
     @endforeach
</ul>                     
  @endif
</div>







    
  