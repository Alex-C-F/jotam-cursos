@extends('main')

@section('title',"| $post->titulo")

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">{{$post->titulo}}</h1>
			<img class="img-responsive" src="{{asset('site/public/imagens/' . $post->url)}}" alt="Algo para mostrar" height="400" width="800"/>
			
			<h3>
				<p class="lead">
					{!!$post->texto!!}
				</p>
				
			</h3>
			
		</div>
	</div>

	
	
@endsection