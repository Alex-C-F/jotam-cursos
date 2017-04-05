@extends('main')
@section('stylesheets')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('title','| Busca')
@section('content')
	<style>
		body {
	  margin: 0px;
	  padding: 0px;
	}

	.cuadro_intro_hover{
        padding: 0px;
		position: relative;
		overflow: hidden;
		height: 200px;
	}
	.cuadro_intro_hover:hover .caption{
		opacity: 1;
		transform: translateY(-150px);
		-webkit-transform:translateY(-150px);
		-moz-transform:translateY(-150px);
		-ms-transform:translateY(-150px);
		-o-transform:translateY(-150px);
	}
	.cuadro_intro_hover img{
		z-index: 4;
	}
	.cuadro_intro_hover .caption{
		position: absolute;
		top:150px;
		-webkit-transition:all 0.3s ease-in-out;
		-moz-transition:all 0.3s ease-in-out;
		-o-transition:all 0.3s ease-in-out;
		-ms-transition:all 0.3s ease-in-out;
		transition:all 0.3s ease-in-out;
		width: 100%;
	}
	.cuadro_intro_hover .blur{
		background-color: rgba(0,0,0,0.7);
		height: 300px;
		z-index: 5;
		position: absolute;
		width: 100%;
	}
	.cuadro_intro_hover .caption-text{
		z-index: 10;
		color: #fff;
		position: absolute;
		height: 300px;
		text-align: center;
		top:-20px;
		width: 100%;
	}
	.col-md-4{
		padding-bottom: 20px;
	}
	</style>
	<h1>Nome do Pacote: {{$pacote->nome}}</h1>
	<div class="row text-center">	
		<div class="col-md-4">
		
			<div class="cuadro_intro_hover " style="background-color:#cccccc;">
				<p style="text-align:center; margin-top:20px; margin-bottom: 20px;">
					<img class="img-responsive" src="{{asset('site/public/imagens/' . $pacote->url)}}" height="400" width="800"/>
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">{{$pacote->nome}}</h3>
						<p>Clique para conferir!</p>
						<a style="position: relative;" class=" btn btn-primary" href="{{route('pages.modulos',$pacote->nome)}}">Leia mais</a>
					</div>
				</div>
			</div>
	</div>
	</div>
	
	
@endsection
@section('scripts')

{!! Html::script('js/parsley.min.js') !!}