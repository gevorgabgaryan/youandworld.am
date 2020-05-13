 @extends ('layouts/errors')


@section('content')
 <div class="container">
     
 	
 	    <p style="font-size:80px;text-align:center;">
 	          	<a href="{{  route('home', app()->getLocale()) }}" title="{{ trans('lang.title') }}">
                      {{ trans('lang.title') }}
                  </a>
 	    </p>
 	  <p class="text-center display-1" style="font-size:50px; text-align:center;">
 		{!! $title !!}
 			</p>
 		<p style="font-size:80px;text-align:center;">
 		    	<a href="{{  route('home', app()->getLocale()) }}" title="{{ trans('lang.home') }}">
          {{ trans('lang.home') }}
 		       </a>
 		</p>
 		
   
 
 </div>
@endsection
