<!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">

 <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="yandex-verification" content="f68c4bb95374aedc" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $title }}</title>
<link rel="canonical" href="{{ $ogurl }}" />
<link rel="shortcut icon" href="/favicon.ico">
<link rel="icon" type="image/x-icon" href="/favicon.png" />

<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{!! $metaContent !!}" />
<meta name="keywords" content="{!! $keywords !!}" />
<meta name="author" content="Gevorg Abgaryan Գևորգ Աբգարյան" />

<!-- Facebook and Twitter integration -->
<meta property="og:title" content="{{ $ogtitle}}" />
<meta property="og:image" content="{{ $ogimage }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ $ogurl }}"/>
<meta property="og:site_name" content="{!! trans('lang.title') !!}"/>
<meta property="og:description" content="{!! str_limit($ogdesc, 200) !!}"/>

<meta name="twitter:title" content="{{ $ogtitle}}">
<meta name="twitter:description" content="{!! str_limit($ogdesc, 200) !!}">
<meta name="twitter:image" content="{{ $ogimage }}">
<meta name="twitter:card" content="{{ $ogurl }}">





<link rel="stylesheet" href="{{ asset('numerus') }}/css/gacbootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('numerus') }}/css/gevorgac.css">


  <!-- Web-Fonts -->
  <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext"
      rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
      rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Pacifico&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-70822072-2', 'auto');
ga('send', 'pageview');

</script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e7be780b4fb830012007862&product=inline-share-buttons" async="async"></script>

<script type="text/javascript">
    window._mNHandle = window._mNHandle || {};
    window._mNHandle.queue = window._mNHandle.queue || [];
    medianet_versionId = "3121199";
</script>
<script src="https://contextual.media.net/dmedianet.js?cid=8CU234O85" async="async"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(62098813, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/62098813" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body id="top"  >
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>


<div id="page"></div>
<!-- nav -->
@yield("navigation")
<!-- slider -->

@yield("slider")

<div class="wrap_result" ></div>

<!-- YouandMainTop -->


<div class="container-fluid pt-2 ">
  
    

<!--govazd-->
 @php
    
              if(app()->getLocale()=='ru' || app()->getLocale()=='en'){
                     
                   @endphp  
    

<!-- SiteTop -->
<ins class="adsbygoogle"
     style="display:inline-block;width:1200px;height:120px"
     data-ad-client="ca-pub-6229763467370402"
     data-ad-slot="4350676264"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
  @php
}else{
  @endphp 
<div class="container-fluid  border border-priamry p-2 bg-light">
	<style>
   
		.AddContent{
		font-style:normal !important;
line-height:1.2 !important;
   font-size: 22px;
    letter-spacing: 1px;
   color: black!important;
    text-shadow: 2px 5px 3px rgba(0, 0, 0, 0.18);
	

		}
	.AddLink{
	animation:Cont 2s linear infinite;	
	border:solid #DCDDDF;
	color: #DCDDDF;
	padding: 2px;
	margin-top: 15px;
	display: inline-block;
	text-shadow: none;
	cursor: pointer;
	text-decoration: none;
	font-family: 'Open Sans', sans-serif;
	}
	.AddLink:hover{
		background-color: #DCDDDF;
		text-decoration: none;
		color: white;

	}

		@keyframes Cont{
			0%, 100%{
				opacity: 1;
			}
			50%{
				opacity: 0.9;
			}
		}
	</style>

	<div class="row ">
		<div class="col-md-3 offset-md-1 text-center">
			<img src="{!! asset('numerus')  !!}/images/Sunny.gif" class="img-fluid AddImage" >
		</div>
		<div class="col-md-8 AddContent text-center font-normal" id="AddSunny1">
			Կայքի գլխավոր հովանավորը 
«Sunny School»-ուսումնական կենտրոնն է <br>
			<a href="https://sunnyschool.am/" target="_blank" class="AddLink ">ԱՎԵԼԻՆ...</i>
          </a>
		</div>
		
		

	</div>
  </div>
  
    @php
}
  @endphp 

   
          <!-- content -->
        
             @yield("content")  
          

          <!-- aside  -->
          
              @yield("bar")
         


@yield('footer')

<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Website",
"name": "Youandworld",
"url": "http://youandworld.am/",
"address": "N. Stepanyan 13",
"sameAs": [
"https://www.instagram.com/youandwoldam/",
"https://www.facebook.com/Youandworld.am/",
"https://twitter.com/yoaundworld",
"https://www.linkedin.com/in/yoaundworld-youand-b43866197/"

]
}
</script>
<a href="#top"><div id="topbutton">&#8593;</div></a>
<!-- fontawesome -->

<link rel="stylesheet" href="{{ asset('numerus') }}/fontawesome/css/all.min.css">
<link href="{{ asset('numerus') }}/fontawesome/js/fontawesome.min.js">

<!-- Bootstrap -->
<script async defer src="{{ asset('numerus') }}/js/bootstrap.min.js"></script>
<script async defer src="{{ asset('numerus') }}/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


<!-- Main -->
<script async defer src="{{ asset('numerus') }}/js/gevorg.js"></script>




<script data-ad-client="ca-pub-6229763467370402" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>






</body>
</html>