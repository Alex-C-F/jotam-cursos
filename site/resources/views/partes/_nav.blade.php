<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="navbar-header">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/"><img src="{{asset('img/jotam.png')}}" height="
        30" width="50" alt=""></a>
  </div>
  
 <div class="collapse navbar-collapse js-navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{Request::is('/') ? "active" : ""}}"><a href="/">Home</a></li>
        <li class="{{Request::is('contact') ? "active" : ""}}"><a href="/contact">Contato</a></li>
        <li class="{{Request::is('fotos') ? "active" : ""}}"><a href="/fotos">Galeria de fotos</a></li>
         <li class="{{Request::is('informacoes') ? "active" : ""}}"><a href="/informacoes">Novidades</a></li>
        <li class="{{Request::is('about') ? "active" : ""}}"><a href="/about">Sobre</a></li>
      </ul>
      <!--menuu========================== -->
          <ul class="nav navbar-nav">
      <li class="dropdown "><!--dropdown-large deixar o menu largo -->
        
        <a href="/cursos" class="dropdown-toggle" data-toggle="dropdown">Cursos<b class="caret"></b></a>
        
        <ul class="dropdown-menu "><!--dropdown-menu-large row -->
           <!--<li class="col-sm-3">

           <ul>
              <li class="dropdown-header">Informática</li>
              <li><a href="#">Windows</a></li>
              <li class="disabled"><a href="#">Word</a></li>
              <li><a href="#">Excel</a></li>
              <li class="divider"></li>
              
            </ul>
          </li>-->
          <li class="col-sm-3">
          <li class="{{Request::is('cursos_slug.index') ? "active" : ""}}"><a href="{{route('cursos_slug.index')}}">Cursos</a></li>
           <li  class="{{Request::is('/pacotes/cursos') ? "active" : ""}}"><a href="/pacotes/cursos">Pacotes</a></li>
        </ul>
        
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
   
        <li class="dropdown">
        @if (Auth::guest())
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Área restrita <span class="caret">
          <ul class="dropdown-menu">
            <li><a href="{{ route('login') }}">Login</a></li>
           <!-- <li><a href="{{ route('register') }}">Registrar</a></li>-->
          </ul>
          </span></a>
         @else
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('posts.index')}}">Ver Notícias</a></li>
            <li><a href="{{route('posts.create')}}">Criar Notícia</a></li>
            <li><a href="{{route('cursos.index')}}">Ver Curso</a></li>
            <li><a href="{{route('cursos.create')}}">Criar Curso</a></li>
            <li><a href="{{route('categorias.index')}}">Categorias</a></li>
            <li><a href="{{route('slides.index')}}">Slides</a></li>
            <li><a href="{{route('galerias.index')}}">Galeria de Fotos</a></li>
            <li role="separator" class="divider"></li>
           
                <li>
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            
          </ul>
        </li>
         @endif
      </ul>
  </div>

</nav>
<hr>

  <!-- Nav Default Bootstrap 
 
</nav>-->