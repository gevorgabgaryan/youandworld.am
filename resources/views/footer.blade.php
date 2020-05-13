 <footer  class="container-fluid">
                                      
                                          
                                                                
                                          @php
                                          $locale = app()->getLocale();

                                           @endphp
                                         @php   
                                               $al= 'alias_'.$locale;
                                               $tit='title_'.$locale;
                                               $name='name_'.$locale;
                                               $desc='desc_'.$locale;
                                               $text='text_'.$locale;
                                               $longtext='longtext_'.$locale;

                                        @endphp
        
             <div class="row row-pb-md">
                    

                                      @if($abouts)

                         @foreach($abouts as $k=>$about)                

                                  @if($k==1 )    

                <div class="col-md-3 text-center">
                   <h3>  {{ trans('lang.founder') }}</h3> 
                     <a href="{{ url($about->link) }}" target="_blank" title="{{ $about->name }}">
                            <img src="{{ asset('numerus')  }}/images/{{ $about->img }}" class="img-fluid  " async defer alt="{{ $about->$name }}">
                          </a>
                            <h2 class="text-center text-primary">
                              <a href="{{ url($about->link) }}" target="_blank">{!! $about->$name !!}</a> <br>
                              <a href="{{ url($about->link) }}" target="_blank">{!! $about->link !!}</a>
                              
                            </h2>
                        
                            

                                

              </div>
                                   @endif
                @if($k==2 )

               <div class="col-md-6 text-center">

                                       <h3> {{ trans('lang.sponsor') }}</h3> 
                                         <a href="{{ url($about->link) }}" target="_blank" title="{{ $about->name }}">
                            <img src="{{ asset('numerus')  }}/images/{{ $about->img }}" class="img-fluid" async defer alt="{{ $about->$name }}">
                          </a>
                      <h2 class="text-center text-primary">
                                <a href="{{ url($about->link) }}" target="_blank">{!! $about->$name !!}</a> <br>
                              <a href="{{ url($about->link) }}" target="_blank">{!! $about->link !!}</a>
                            </h2>
                                       

                </div>
            @endif
            @if($k==6 )
            


           <div class="col-md-3 text-center ">
                                         <h3> {{ trans('lang.fbshare') }}</h3> 
                     
                           
             <p>
                 <a href="https://twitter.com/yoaundworld?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @yoaundworld</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
             </p>
            <p>   
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FYouandworld.am%2F&width=450&layout=standard&action=like&size=large&share=true&height=35&appId=971373359887049" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media">
                                 
                             </iframe></p>
         
                   <p>
                           <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fyouandworld.am%2Fapp()->getLocale()&width=450&layout=standard&action=like&size=large&share=true&height=35&appId=971373359887049" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                   </p>    

            </div>
    <!--<div class="col-md-3 text-center">-->

                         

    <!--</div>-->
    @endif
   @endforeach
@endif

        </div>

        
</footer>