	<div id="numerus-container">
	    <p>
	{!! Form::open(['action' => ['Admin\GalleryController@create']
							 			,'class'=>'form-horizontal','method'=>'GET']) !!}
							 		
							 			{!! Form::button('ԱՎԵԼԱՑՆԵԼ', ['class'=>'btn btn-french-5', 'type'=>'submit']) !!}
							 			{!! Form::close() !!}
</p>
			<div class="container">
	         @if($galleryslider )



						 <table style="width: 100%" class="table">
						 	<thead>
						 		<tr>
						 			<th>Id</th>
						 			<th>Վերնագիր</th>
						 			<th>Տեքստ</th>
						 			<th>Նկար</th>
						 
						 			<th>Պսեվդանիմ</th>
						 			<th>Գործողություն</th>
						 		</tr>
						 	</thead>
						 	<tbody>
						 		@foreach( $galleryslider as $galleryslider )
						 		<tr>
							 		<td>{{ $galleryslider ->id }}</td>
							 		<td>{!! Html::link(route('admingallerys.edit', [$galleryslider->alias_hy]), $galleryslider->title_hy) !!}</td>
							 		<td>{{ str_limit($galleryslider->desc_hy, 200) }}</td>
							 		<td>{{ $galleryslider ->img }}</td>
							 	
							 		<td>{{ $galleryslider ->alias }}</td>
							 		<td> 
							 			{!! Form::open(['action' => ['Admin\GalleryController@destroy', $galleryslider->alias_hy]
							 			,'class'=>'form-horizontal','method'=>'POST']) !!}
							 			{{ method_field('DELETE') }}
							 			{!! Form::button('Ջնջել', ['class'=>'btn btn-french-5', 'type'=>'submit']) !!}
							 			{!! Form::close() !!}



							 		</td>
						 	    </tr>
						 		@endforeach
						 	
						 	</tbody>
						 </table>



 @endif


                               </div>
                           </div>

		</div>