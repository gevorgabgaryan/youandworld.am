	<p>
	{!! Form::open(['action' => ['Admin\ArticlesController@create']
							 			,'class'=>'form-horizontal','method'=>'GET']) !!}
							 		
							 			{!! Form::button('ԱՎԵԼԱՑՆԵԼ', ['class'=>'btn btn-french-5 ', 'type'=>'submit']) !!}
							 			{!! Form::close() !!}
</p>
	<div id="numerus-container">
			<div class="container">
	         @if($articles )



						 <table style="width: 100%" class="table">
						 	<thead>
						 		<tr>
						 			<th>Id</th>
						 			<th>Վերնագիր</th>
						 			<th>Տեքստ</th>
						 			<th>Նկար</th>
						 			<th>Տեսակ</th>
						 			<th>Պսեվդանիմ</th>
						 			<th>Գործողություն</th>
						 		</tr>
						 	</thead>
						 	<tbody>
						 		@foreach( $articles as $article )
						 		<tr>
							 		<td>{{ $article ->id }}</td>
							 		<td>{!! Html::link(route('adminarticles.edit', [$article->alias_hy]), $article->title_hy) !!}</td>
							 		<td>{{ str_limit($article->desc_hy, 200) }}</td>
							 		<td>{{ $article ->img }}</td>
							 		<td>{{ $article ->categories->title_hy}}</td>
							 		<td>{{ $article ->alias_hy }}</td>
							 		<td> 
							 			{!! Form::open(['action' => ['Admin\ArticlesController@destroy', $article->alias]
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