	<div id="numerus-container">
			<div class="container">
	         @if($poems )



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
						 		@foreach( $poems as $poem )
						 		<tr>
							 		<td>{{ $poem ->id }}</td>
							 		<td>{!! Html::link(route('adminpoems.edit', [$poem->alias_hy]), $poem->title_hy) !!}</td>
							 		<td>{{ str_limit($poem->desc_hy, 200) }}</td>
							 		<td>{{ $poem ->img }}</td>
							 		<td>{{ $poem ->alias_hy }}</td>
							 		<td> 
							 			{!! Form::open(['action' => ['Admin\PoemsController@destroy', $poem->alias_hy]
							 			,'class'=>'form-horizontal','method'=>'POST']) !!}
							 			{{ method_field('DELETE') }}
							 			{!! Form::button('Ջնջել', ['class'=>'btn btn-french-5', 'type'=>'submit']) !!}
							 			{!! Form::close() !!}



							 		</td>
						 	    </tr>
						 		@endforeach
						 	
						 	</tbody>
						 </table>

<p>
	{!! Form::open(['action' => ['Admin\PoemsController@create']
							 			,'class'=>'form-horizontal','method'=>'GET']) !!}
							 		
							 			{!! Form::button('ԱՎԵԼԱՑՆԵԼ', ['class'=>'btn btn-french-5', 'type'=>'submit']) !!}
							 			{!! Form::close() !!}
</p>

 @endif


                               </div>
                           </div>

		</div>