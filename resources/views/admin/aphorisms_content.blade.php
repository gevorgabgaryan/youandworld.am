	<p>
	{!! Form::open(['action' => ['Admin\AphorismController@create']
							 			,'class'=>'form-horizontal','method'=>'GET']) !!}
							 		
							 			{!! Form::button('ԱՎԵԼԱՑՆԵԼ', ['class'=>'btn btn-french-5', 'type'=>'submit']) !!}
							 			{!! Form::close() !!}
</p>
	<div id="numerus-container">
			<div class="container">
	         @if($aphorisms )



						 <table style="width: 100%" class="table">
						 	<thead>
						 		<tr>
						 			<th>Id</th>
						 			<th>Վերնագիր</th>
						 			<th>Ա</th>
						 			<th>Նկար</th>
						 			<th>Տեսակ</th>
						 			<th>Պսեվդանիմ</th>
						 			<th>Գործողություն</th>
						 		</tr>
						 	</thead>
						 	<tbody>
						 		@foreach( $aphorisms as $aphorisms )
						 		<tr>
							 		<td>{{ $aphorisms ->id }}</td>
							 		<td>{!! Html::link(route('adminaphorisms.edit', [$aphorisms->alias_hy]), $aphorisms->title_hy) !!}</td>
							 		<td>{{ str_limit($aphorisms->desc_hy, 200) }}</td>
							 		<td>{{ $aphorisms ->img }}</td>
							 		
							 		<td>{{ $aphorisms ->alias_hy }}</td>
							 		<td> 
							 			{!! Form::open(['action' => ['Admin\AphorismController@destroy', $aphorisms->alias_hy]
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