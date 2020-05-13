  
@php
  $locale = app()->getLocale();

@endphp


          <div class="col-md-10 offset-md-1">
     
                              @if($poem )
                                       @php   
                                               $al= 'alias_'.$locale;
                                               $tit='title_'.$locale;
                                               $name='name_'.$locale;
                                               $text='text_'.$locale;
                                               $longtext='longtext_'.$locale;

                                       @endphp


                           
                                <h1 class="text-center" class="ga_title">{{$poem-> $tit}}</h1>
                                
                                 <img src="{{ asset('numerus') }}/images/{{ $poem->img}}"   title="{{ $poem-> $tit}}" alt="{{ $poem->keywords}}" class="img-fluid ga_mainimg"  >

                                <p class="ga_info text-center"><i class="icon-calendar3"></i> {{ $poem->created_at->format('F d , Y' ) }} 
                                </p>
                        
                            
<!-- YouAfterContentImage -->
           @php
    
              if(app()->getLocale()=='ru' || app()->getLocale()=='en'){
                     
                   @endphp  
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:120px"
     data-ad-client="ca-pub-6229763467370402"
     data-ad-slot="1070199358"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
  @php
}else{
  @endphp 

  
    @php
}
  @endphp 
                             <div class="ga_desc text-center bg-light">
@php
                                 
                   
                   
                      $str = preg_replace('/\n(\s*\n)+/', '</p><p>', $poem->$text);
                      $str = preg_replace('/\n/', '<br>', $str);
                      $str = '<p>'.$str.'</p>';

                   
                      $content = explode("</p>", $str);
                    
                        for($i = 0; $i < count($content); $i++) {
              if(app()->getLocale()=='ru' || app()->getLocale()=='en'){
                        if ($i%3==0) {
                   @endphp   
                        
{!! '<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6229763467370402"
     data-ad-slot="2652790053"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>' !!}

   @php
                        }
}
                       @endphp  

               
   @php
    if(app()->getLocale()=='hy'){                 
                                               if ($i==2) {
                   @endphp   
                        

<div class="container-fluid bg-white p-2">
	<style>
   
		.AddContent{
		font-style:normal !important;

   font-size: 28px;
    letter-spacing: 1px;
   color: black!important;
    text-shadow: 2px 5px 3px rgba(0, 0, 0, 0.18);
	

		}
	.AddLink{
	animation:Cont 2s linear infinite;	
	border:solid #DCDDDF;
	color: #DCDDDF;
	padding:5px;
	margin-top: 15px;
	display: inline-block;
	text-shadow: none;
	cursor: pointer;
	text-decoration: none;
	font-family: 'Open Sans', sans-serif;
	}
	.AddLink:hover{
		background-color: #DCDDDF;
		text-decoration: none;
		color: white;

	}

		@keyframes Cont{
			0%, 100%{
				opacity: 1;
			}
			50%{
				opacity: 0.9;
			}
		}
	</style>

	<div class="row ">
		<div class="col-md-3 offset-md-1 text-center">
			<img src="{!! asset('numerus')  !!}/images/Sunny.gif" class="img-fluid AddImage" >
		</div>
		<div class="col-md-8 AddContent text-center font-normal" id="AddSunny1">
			Հեռավար «Անգլերենի» դասընթացներ
«Sunny School»-ում <br>
			<a href="https://sunnyschool.am/english-courses/" target="_blank" class="AddLink ">ԱՎԵԼԻՆ...</i>
          </a>
		</div>
		
  </div>		

</div>
   @php
                        }
                       @endphp 
@php
                    
                                               if ($i==7) {
                   @endphp   
                        

<div class="container-fluid bg-white p-2">
	<style>
   
		.AddContent{
		font-style:normal !important;

   font-size: 28px;
    letter-spacing: 1px;
   color: black!important;
    text-shadow: 2px 5px 3px rgba(0, 0, 0, 0.18);
	

		}
	.AddLink{
	animation:Cont 2s linear infinite;	
	border:solid #DCDDDF;
	color: #DCDDDF;
	padding: 5px;
	margin-top: 15px;
	display: inline-block;
	text-shadow: none;
	cursor: pointer;
	text-decoration: none;
	font-family: 'Open Sans', sans-serif;
	}
	.AddLink:hover{
		background-color: #DCDDDF;
		text-decoration: none;
		color: white;

	}

		@keyframes Cont{
			0%, 100%{
				opacity: 1;
			}
			50%{
				opacity: 0.9;
			}
		}
	</style>

	<div class="row ">
		<div class="col-md-3 offset-md-1 text-center">
			<img src="{!! asset('numerus')  !!}/images/Sunny.gif" class="img-fluid AddImage" >
		</div>
		<div class="col-md-8 AddContent text-center font-normal" id="AddSunny1">
			Հեռավար «ՎԵԲ ԾՐԱԳՐԱՎՈՐՄԱՆ» դասընթացներ
«Sunny School»-ում <br>
			<a href="https://sunnyschool.am/hy/web/" target="_blank" class="AddLink "> ԱՎԵԼԻՆ...</i>
          </a>
		</div>
		
		

	</div>
    </div>	

   @php
                        }
                       @endphp 
@php
                    
                                               if ($i==12) {
                   @endphp   
                        

  <style>
#AddNumerus #mainsvg{
  display: block;
  position: relative;
  
  min-height: 120px;
}   
    #mainsvg svg{
transform: scale(0.3);
width: 450px;
height: 400px;
overflow: hidden;
position: absolute;
top: -165px;
left:-210px;


}
  #AddNumerus  span{
   
  margin-left: 120px;
  border: solid;
  display:inline-block;
    font-size: 32px;
    letter-spacing: 1px;
    color:rgb(2,33,80) !important;
    text-shadow: 2px 5px 3px rgba(0, 0, 0, 0.18);
    font-family: 'Pacifico', cursive;
}
   
    .AddContent{

      

   font-size: 22px;
    letter-spacing: 1px;
   color: black!important;
    text-shadow: 2px 5px 3px rgba(0, 0, 0, 0.18);
  

    }
  .AddLink{
  animation:Cont 2s linear infinite;  
  border:solid #DCDDDF;
  color: #DCDDDF;
  padding: 5px;
  display: inline-block;
  text-shadow: none;
  cursor: pointer;
  text-decoration: none;
  font-family: 'Open Sans', sans-serif;
  }
  .AddLink:hover{
    background-color: #DCDDDF;
    text-decoration: none;
    color: white;

  }



  </style>
<div class="container-fluid bg-white p-2">
  <div class="row pt-1" id="AddNumerus">
    <div class="col-md-2 text-center" >
       <a class="navbar-brand" href="https://numerussystem.com/" target="_blank" >
      <div id='mainsvg' >
         <svg  >
              <circle cx="160" cy="200" r="150"
              stroke="black" stroke-width="7" fill="white" id='circlel' />
             <polyline style=" stroke:black;     stroke-width:7; fill: none;"
                    points="90 90, 90 310, 154 202" id='line1l'/>
             <polyline style=" stroke:black;     stroke-width:7; fill: none;"
                    points="157 198, 220 100, 220 320" id='line2l' />
            </svg>
              
      </div>
            
         
     
       </a>
    
     </div>
     <div class="col-md-2 AddContent text-center">
       ՆՈՒՄԵՐՈՒՍ ՍԻՍՏԵՄ 
     </div>
    <div class="col-md-8 AddContent text-center" >
     ԿԱՅՔԵՐԻ ՊԱՏՐԱՍՏՈՒՄ <br>
      <a href="https://numerussystem.com/" target="_blank" class="AddLink ">ԱՎԵԼԻՆ..
          </a>
    </div>
    
    </div>    

  </div>

  <script>
const rand1=(min,max)=>{
    return Math.floor(Math.random()*(max-min)+min);
}

// logosvg

    var timer=setInterval(()=>{
          if(rand1(0,2)==1){
      color1='rgb(2,33,80)'
    }else{
      color1='rgb(255,255,255)'
    }
      if(rand1(0,2)==1){
      color2='rgb(2,33,80)'
    }else{
      color2='rgb(255,255,255)'
    }
      if(rand1(0,2)==1){
      color3='rgb(2,33,80)'
    }else{
      color3='rgb(255,255,255)'
    }
     line1l.style.stroke=color1
     line2l.style.stroke=color2
     circlel.style.stroke=color3
   
    },500)
  </script>

   @php
                        }
                       @endphp                        
                      
   @php
                        
      }                  
                       @endphp 
                     
                     {!!   $content[$i] !!}
             @php         
        }

                               @endphp
 
                              </div>    


<p class="text-center">
    <a class="" href="{{  route('poem', app()->getLocale()) }}" target="_blank" title="{{ trans('lang.apoem')}}">{{ trans('lang.poem')}}</a> <br><br>
              
         <div class="fb-share-button" id="fb-share-button" style="margin-left:47%; margin-bottom:20px;"  data-href="https://youandworld.am/{{app()->getLocale()}}/poems/{{ $poem->$al }}" data-layout="button_count" data-size="large"> <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fyouandworld.am%2F{{app()->getLocale()}}%2Fpoems%2F{{ $poem->$al }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" title="{{ $poem->$al }}">Share</a></div>
    <div class="sharethis-inline-share-buttons mt-2"></div> 
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

  
  
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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







      @endif
 