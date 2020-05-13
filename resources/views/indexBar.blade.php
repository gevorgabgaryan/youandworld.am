<div class="col-lg-3">
<aside class="text-center">
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
                        
                       <div class="ga_fb">
                            {{ trans('lang.fblike') }} 
                             <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FYouandworld.am%2F&width=450&layout=standard&action=like&size=large&share=true&height=35&appId=971373359887049" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media">
                                 
                             </iframe>
                      </div>
                   
                    
              


                                     
@if($abouts)
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


  @foreach($abouts as $k=>$about)

      @if($k>=0)


            @if($k%2==0)
                    <div class="ga_aside">
                          <a href="{{ url($about->link) }}" target="_blank" title="{{ $about->name }}">
                            <img src="{{ asset('numerus')  }}/images/{{ $about->img }}" class="img-fluid" async defer alt="{{ $about->$name }}" >
                          </a>
                           
                             @if($k==0)
                            <h2 class="text-center">
                              <a href="{{ url($about->link) }}" target="_blank">{!! $about->$name !!} </a>
                            </h2>
                            @else
                            <h2 class="text-center">
                              <a href="{{ url($about->link) }}" target="_blank">{!! $about->$name !!}</a>
                            </h2>
                            
                            @endif
                           
                            <span>
                                {!! $about->$desc !!}
                            </span>
          
             
               </div>  
             @elseif( $k==1)
              <div class="ga_aside">
                           <a href="{{ url($about->link) }}" target="_blank" title="{{ $about->name }}">
                            <img src="{{ asset('numerus')  }}/images/{{ $about->img }}" class="img-fluid" async defer alt="{{ $about->$name }}">
                          </a>
                            <h2 class="text-center">
                              <a href="{{ url($about->link) }}" target="_blank">{!! $about->$name !!}</a> 
                            </h2>
                        
                            <span>
                                {!! $about->$desc !!}
                            </span>
          
             
             </div>
             @else
                <div class="ga_aside">
                            <h2 class="sidebar-heading">
                              <a href="{{  route($about->link, app()->getLocale()) }}" target="_blank" title="{{ $about->$name }}">{!! $about->$name !!}</a>
                            </h2>
                            <span>
                                 {!! $about->$desc !!}
                            </span>
                </div>


             @endif
      @endif
   @endforeach
@endif
                       
                       


                     
                                  
                  
                               



</aside>



 </div>
  </div>