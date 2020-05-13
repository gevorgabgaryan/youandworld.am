	
		@foreach($items as $item)
			<div class="comment-post {{ $item->user_id = $article->user_id? 'bypostautor odd' : ''}}" id="div-comment={{ $item->id }}">		
						@set($hash, isset($item->email) ? md5($item->email) : md5($item->user->email))
				                <div class="user" style="background-image: url(https://www.gravatar.com/avatar/{{ $hash }}?d=mp&s=75 );">
									
								</div>
								<div class="desc">
									<h3>{{$item->name     }} <span>{{  is_object($item->created_)? $item->created_at->format('F d, Y \a\t H:i') : "" }}</span></h3>
									<p>{{ $item->text }}</p>
								</div>
			</div>
		@endforeach						
	