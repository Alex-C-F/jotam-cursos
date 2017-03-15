@extends('main')
@section('title','| View Post')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->titulo }}</h1>
		<p class="lead"> {{ $post->texto }}</p>
		</div>
		<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Criado em:</dt>
				<dd>{{date('M j, Y H:i', strtotime($post->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Última atualização</dt>
				<dd>{{date('M j, Y H:i', strtotime($post->updated_at))}}</dd>
			</dl>
			<hr>
			
				<div class="col-sm-12">
					{!! Html::linkRoute('welcome', '<< Ver todos os posts',null,array('class'=>'btn btn-primary btn-block')) !!}					
				</div>
			</div>
		</div>
	</div>
		
	</div>

	
	
@endsection