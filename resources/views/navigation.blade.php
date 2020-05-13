    
@if($menu)
 <nav class="navbar navbar-expand-lg fixed-top " id="mainNav">
   <form action="{{ route('search',app()->getLocale()) }}" role="search" method="get" class="form-inline ga_search text-center">

                    
                                    <input type="text" class="text-primary mr-sm-2" id="search" name="search" placeholder="Enter any key to search...">
                                    <button type="submit" class="btn "><i class="fas fa-search"></i></button>
                             
    </form>
     <a class="navbar-brand" href="{{  route('home', app()->getLocale()) }}" title="{{ trans('lang.ntitle') }}">
          {{ trans('lang.ntitle') }}
    </a>
   
                   
    <div id="ga_lang">

          @foreach(config('app.locales') as $locale)
                   @if (app()->getLocale() !== $locale)
                 
                      <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),  array_merge(\Illuminate\Support\Facades\Route::current()->parameters(),['locale'=>$locale])) }}" class="lang" >@if ( $locale=='hy')

                                    {{ 'Հայ' }}
                                    
                                    @elseif($locale=='ru')
                                    
                                    {{ 'ру' }}
                                    @else
                                    {{ $locale}}
                                    @endif</a>
                  
                     @endif
            @endforeach
       <a >
        @php $locale = app()->getLocale(); @endphp
                        {{ $locale }}
       </a>
    
                       
     
                    
              
                                  
      </div>

  
      <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar" id='icon'>
        &#9776;
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav">
             @include('customMenuItems', ['items'=>$menu])
      
       
               
             
        </ul>
                
     
      </div>  
     </nav> 
 

@endif
    
                               
         