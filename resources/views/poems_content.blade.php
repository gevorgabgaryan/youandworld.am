
    @if($poems && count($poems)>0)

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

<div class="row">                                  
     <div class="col-lg-9">                                      
         <h1 class="text-center pb-2">{{ trans('lang.poem')}} </h1>
               @foreach($poems as $k=>$poem)
      
                      <article  class="ga_main_article pt-3">
                            
                                                
                                   
                          
                                <h2 class="text-center  p-2">
                                    <a href="{{ route('poems.show', ['alias'=>$poem->$al,'locale'=>app()->getLocale()]) }}" title="     {!!  $poem->$desc !!}}" class="ga_title">  
                                      {!!  $poem->$tit !!}</a>
                                </h2>
                                 <a href="{{  route('poems.show', ['alias'=>$poem->$al,'locale'=>app()->getLocale()]) }}"  title="  {!!  $poem->$tit !!}">
                                        <img src="{{ asset('numerus') }}/images/{{ $poem->img}}"   
                                        title="{!!  $poem->$tit !!}}" alt="    
                                                    {!!  $poem->$keywords !!}}" class="img-fluid" class="ga_mainimg">
                                </a>

                         <p class="ga_info">
                          <span>
                            <i class="fa fa-calendar"></i>{{                                $poem->created_at->format('F d , Y' ) }}  
                          </span>
                                                                                     

                         </p>
                                
                          
                            <div class="ga_desc">
                        
                                      
                                             

                                  {!! str_limit($poem-> $desc, 200)  !!}
                                
                            </div>
                            
                       
              <p class="text-center ga_button">
                <a 
                href="{{ route('poems.show', ['alias'=>$poem->$al, 'locale'=>app()->getLocale()]) }}"                    
                                      title="  @php
                 $o= 'title_'.$locale
                @endphp
                      {!!  $poem->$o !!}}">{{ trans('lang.read_more')   }}
                    </a>
              </p>


      </article>
                      @endforeach()
<div class="container text-center">             
  <ul class="pagination text-center justify-content-center">

                                    @if($poems->lastPage()>1)

                                         @if($poems->currentPage()!== 1)
                <li class="page-item"> <a href="{{ $poems->url($poems->currentPage()-1) }}" title="
                {!!  $poem->$tit !!}" class="page-link">&laquo;</a>
              </li>
                                         @endif

                                               @for($i=1; $i<=$poems->lastPage(); $i++)
                                        @if($poems->currentPage()==$i)

                                          <li class="page-item"><a class="page-link elected disabled" title="
                {!!  $poem->$tit !!}">{{ $i }}</a></li>
                                        @else

                                          <li><a href="{{ $poems->url($i) }}"  class="page-link selected disabled" title="  
                {!!  $poem->$tit !!}">{{ $i }}</a></li>
                                        @endif


                                    @endfor
                                     @if($poems->currentPage()!==$poems->lastPage())
                                         <li class="page-item"> <a href="{{ $poems->url($poems->currentPage()+1) }}" title="
                {!!  $poem->$tit !!}" class="page-link">&raquo;</a>
              </li>

                                        @endif

                                    @endif
                   @endif
     </ul>
     </strong>
     </em>
</div>
</div>
