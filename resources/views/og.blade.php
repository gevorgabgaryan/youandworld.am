<meta property="og:title" content="{{ $article->title }}" />
<meta property="og:image" content="{{ asset('numerus') }}/images/{{ $article->img}}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{  route('articles.show', ['alias'=>$article->alias,'locale'=>app()->getLocale()]) }}"/>
<meta property="og:site_name" content="{!! trans('arm.title') !!}"/>
<meta property="og:description" content="{!! str_limit($article->desc, 200)  !!}"/>
