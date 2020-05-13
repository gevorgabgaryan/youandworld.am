    <div class="row">                                  
     <div class="col-lg-9"> 
        <h1 class="text-center pb-2">{{ trans('lang.'.$pagetitle)}} </h1>
@php
  $locale = app()->getLocale();

@endphp
         
      @if($articles && count($articles)>0)
      
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

     
               
          	   @foreach($articles as $k=>$article)
      
                      <article  class="ga_main_article pt-3">
                            
                           <p class="ga_cat_title text-center">
                               <a href="{{  route($article->categories->alias_en, app()->getLocale()) }}" title="{{ trans('lang.'.$article->categories->$al)}}"  >

                                                 {{ $article->categories->$tit }}
                                   
                                    </a>
                            </p >    
                                  
                                   
                          
                                <h2 class="text-center  p-2">
                                    <a href="{{ route('articles.show', ['alias'=>$article->$al,'locale'=>app()->getLocale()]) }}" title="     {!!  $article->$desc !!}}" class="ga_title">  
                                      {!!  $article->$tit !!}</a>
                                </h2>
                                 <a href="{{  route('articles.show', ['alias'=>$article->$al,'locale'=>app()->getLocale()]) }}"  title="  {!!  $article->$tit !!}">
                                        <img src="{{ asset('numerus') }}/images/{{ $article->img}}"   
                                        title="{!!  $article->$tit !!}}" alt="    
                                                    {!!  $article->$keywords !!}}" class="img-fluid ga_mainimg " >
                                </a>

                         <p class="ga_info">
                          <span>
                            <i class="fa fa-calendar"></i>{{                                $article->created_at->format('F d , Y' ) }}  
                          </span>
                           <span>
                            <i class="fas fa-user"></i>{{ $article->user->name }} 
                          </span>
                           <span>
                            <a href="{{  route('articles.show', ['alias'=>$article->$al, 'locale'=>app()->getLocale()]) }}"><i class='fa fa-comment'></i>{{  count($article->comment)?  count($article->comment) : '0' }}{{  Lang::choice('lang.comment',  count($article->comment)) }}</a>
                          </span>
                                                            

                         </p>
                                
                          
                            <div class="ga_desc">
                        
                                      
                                             

                                  {!! str_limit($article->$text, 200)  !!}
                                
                            </div>
                            
                       
              <p class="text-center ga_button">
                <a 
                href="{{ route('articles.show', ['alias'=>$article->$al, 'locale'=>app()->getLocale()]) }}"                    
                                      title="  @php
                 $o= 'title_'.$locale
                @endphp
                      {!!  $article->$o !!}}">{{ trans('lang.read_more')   }}
                    </a>
              </p>
        <!-- ptoblem db -->
            </strong>
      </article>
                      @endforeach()
      

  <ul class="pagination text-center justify-content-center">

                                    @if($articles->lastPage()>1)

                                         @if($articles->currentPage()!== 1)
                <li class="page-item"> <a href="{{ $articles->url($articles->currentPage()-1) }}" title="
                {!!  $article->$tit !!}" class="page-link">&laquo;</a>
              </li>
                                         @endif

                                               @for($i=1; $i<=$articles->lastPage(); $i++)
                                        @if($articles->currentPage()==$i)

                                          <li class="page-item"><a class="page-link elected disabled" title="
                {!!  $article->$tit !!}">{{ $i }}</a></li>
                                        @else

                                          <li><a href="{{ $articles->url($i) }}"  class="page-link selected disabled" title="  
                {!!  $article->$tit !!}">{{ $i }}</a></li>
                                        @endif


                                    @endfor
                                     @if($articles->currentPage()!==$articles->lastPage())
                                         <li class="page-item"> <a href="{{ $articles->url($articles->currentPage()+1) }}" title="
                {!!  $article->$tit !!}" class="page-link">&raquo;</a>
              </li>

                                        @endif

                                    @endif
                   @endif
          </ul>
      <ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-41+cy+11-v6+11f"
     data-ad-client="ca-pub-6229763467370402"
     data-ad-slot="8350767464"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                  
</div>
              
     



