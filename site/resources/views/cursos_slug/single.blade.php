@extends('main')

@section('title',"| $curso->nome")


@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">{{$curso->nome}}</h1>
			<img class="img-responsive" src="{{asset('site/public/imagens/' . $curso->imagem)}}" alt="Algo para mostrar" height="600" width="1024"/>
				<p class="lead">
					<h3>
						{!!$curso->descricao!!}
					</h3>
					
				</p>
			
		</div>
	</div>

	
	
@endsection