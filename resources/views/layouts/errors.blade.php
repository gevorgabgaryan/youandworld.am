<!DOCTYPE HTML>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="yandex-verification" content="f68c4bb95374aedc" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Youandworld</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Դուք և աշխարհը, սոցիալ-հոգեբանական, տեղեկատվական,  խորհրդատվական կայք" />
    <meta name="keywords" content="Մոտիվացնել երիտասարդությանը` տալով գիտելիքներ և հմտություններ՝ բիզնեսում և կարիերայում, ինչպես նաև անձնական կյանքում հաջողության հասնելու համար: Այդ ամբողջ գործընթացն ընթանում է անհատի ձևավորումից մինչև հասարակական կյանքում առողջ վարքագծով քաղաքացու  ձևավորումը. չկա առողջ հասարակություն՝առանց առողջ անհատի:" />
    <meta name="author" content="Gevorg Abgaryan" />


    <link rel="stylesheet" href="{{ asset('numerus') }}/css/bootstrap.min.css">



    </head>
    <body ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
         <div id="fb-root"></div>


        <div id="colorlib-container">
            <div class="container">
                <div class="row">
          <!--  content -->
                      @yield("content")
                
                </div>
            </div>
        </div>

 

    </body>
</html>

