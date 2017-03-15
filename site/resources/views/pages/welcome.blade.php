@extends('main')
@section('title','| HomePage')
@section('content')
<!-- CSS ================================================================ -->
<style type="text/css">

   @import url(http://fonts.googleapis.com/css?family=Anaheim);

.body{
    margin: 0% auto;
    width: 210px;
    height: 140px;
    position: relative;
    perspective: 1000px;
}
#carousel{
    width: 100%;
    height: 100%;
    position: absolute;
    transform-style: preserve-3d;
    animation: rotation 20s infinite linear;
}
#carousel:hover{
    animation-play-state: paused;
}
p{
    color: black;
}
#carousel figure{
    display: block;
    position: absolute;
    width: 90%;
    height: 50%px;
    left: 10px;
    top: 10px;
    background: black;
    overflow: hidden;
    border: solid 5px black;
}
#carousel figure:nth-child(1){transform: rotateY(0deg) translateZ(288px);}
#carousel figure:nth-child(2) { transform: rotateY(40deg) translateZ(288px);}
#carousel figure:nth-child(3) { transform: rotateY(80deg) translateZ(288px);}
#carousel figure:nth-child(4) { transform: rotateY(120deg) translateZ(288px);}
#carousel figure:nth-child(5) { transform: rotateY(160deg) translateZ(288px);}
#carousel figure:nth-child(6) { transform: rotateY(200deg) translateZ(288px);}
#carousel figure:nth-child(7) { transform: rotateY(240deg) translateZ(288px);}
#carousel figure:nth-child(8) { transform: rotateY(280deg) translateZ(288px);}
#carousel figure:nth-child(9) { transform: rotateY(320deg) translateZ(288px);}

img{
    cursor: pointer;
    transition: all .5s ease;
}
img:hover{
    -webkit-filter: grayscale(0);
  transform: scale(1.2,1.2);
}

@keyframes rotation{
    from{
        transform: rotateY(0deg);
    }
    to{
        transform: rotateY(360deg);
    }
}

        .jssorl-oval img {
            animation-name: jssorl-oval;
            animation-duration: 1.2s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-oval {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        .jssora22l.jssora22lds      (disabled)
        .jssora22r.jssora22rds      (disabled)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
        .jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
        .jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }

</style>
<!-- CSS ================================================================ -->
      <script src="js/jssor.slider-22.2.11.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
    </script>

<div class="row">
     <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1500px;height:600px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-oval" style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19.0px;position:relative;top:50%;width:38px;height:38px;" src="img/oval.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1500px;height:600px;overflow:hidden;">
            @foreach ($cursos as $curso)
            <div>
               <a href="{{route('cursos_slug.single', $curso->slug)}}"><img data-u="image" src="{{asset('site/public/imagens/'.$curso->imagem)}}" /></a> 
               
                <div style="position:absolute;top:370px;left:100px;width:600px;height:120px;z-index:0;background-color:rgba(255,255,255,0.5);">
                    <div style="position:absolute;top:15px;left:15px;width:500px;height:40px;z-index:0;font-size:30px;color:#000000;line-height:40px;">{{$curso->nome}}</div>
                    <div style="position:absolute;top:60px;left:15px;width:500px;height:40px;z-index:0;font-size:22px;color:#000000;line-height:38px;"><a class="btn btn-primary" href="{{route('cursos_slug.single', $curso->slug)}}">Venha Conferir</a></div>
                </div>
            </div>
            @endforeach
        
           
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!--end slide -->
</div>
<hr>
<div class = "col-md-8">
    <!--Form de promoção-->
    <h2>Ganhe 50% de desconto aqui</h2>
    <form id="signin" class="navbar-form navbar-left" role="form"  action="{{ url('contact/desconto')}}" method="POST">
     {{csrf_field()}}
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="nome" type="text" class="form-control" name="nome" value="" placeholder="Nome">                                        
        </div>

        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input id="phone" type="phone" class="form-control" name="telefone" value="" placeholder="Telefone">                                        
        </div>

        <button type="submit" class="btn btn-primary">OK</button>
    </form>
    <div class="col-md-12">
         <h2>Notícias </h2>
    @foreach ($posts as $post)
    <div >
        <h3>{{$post->titulo}}</h3>
        <h5>Publicado em: {{ date('M j,Y',strtotime($post->created_at)) }}</h5>
        <p>{{substr(strip_tags($post->texto),0,300)}}{{strlen(strip_tags($post->texto)) > 300 ? "..." : ""}}</p>
        <p><a href="{{ url('informacoes/'.$post->slug)}}" class="btn btn-primary">Leia mais</a></p>
    </div><!--end post-->
    <hr>
    @endforeach 
    </div>
  
</div><!--Fim col-md-8-->
<div class="col-md-3 col-md-offset-1">
   <h2>Mais informações</h2>
   <ul >
        <li><a class="btn-spacing-top btn btn-primary btn-block" href="{{route('cursos_slug.index')}}">Cursos</a></li>
       <li><a class="btn-spacing-top btn btn-primary btn-block" href="\pacotes\cursos">Pacotes de Cursos</a></li>
        <li><a class="btn-spacing-top btn btn-primary btn-block" href="http://web.arapiraca.al.gov.br/vagas-do-sine/" target="_blank">Vagas Sine</a></li>
        <li><a class="btn-spacing-top btn btn-primary btn-block" href="\fotos">Galeria de fotos</a></li>
    </ul>

</div>

</div><!--Fim row--><!--Fim row-->
<div class="text-center">
    <h1>Últimos Cursos Lançados</h1>
</div>
<hr>
<!-- Slide Rotaciona-->
<div class="container">
   <div class="body">
        <div id="carousel">
            @foreach ($cursos as $curso)
            <figure><a href="{{route('cursos_slug.single',$curso->slug)}}"><img src="{{asset('site/public/imagens/'.$curso->imagem)}}" height="100" width="240" alt=""></a></figure>
            @endforeach

        </div>
    </div>
</div>

<hr>
        
@endsection
	