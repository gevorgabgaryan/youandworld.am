 @foreach($items as $item)

 <li >
 	<a href="{{  route($item->path, app()->getLocale()) }}" title="{{ trans('lang'.$item->path) }}" class="nav-link">{{ trans('lang.'.$item->path)  }}</a>
 </li>
@endforeach