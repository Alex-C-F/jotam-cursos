@extends('main')
@section('title','| View Post')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>{{ $post->titulo }}</h1>
		<p class="lead"> {!! $post->texto !!}</p>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Url: </label>
				<label><a href="{{ route('informacao.single',$post->slug ) }}">{{ route('cursos_slug.single',$post->slug) }}</a></label>
			</dl>
			<dl class="dl-horizontal">
				<label>Criado em:</label>
				<label>{{date('M j, Y H:i', strtotime($post->created_at))}}</label>
			</dl>
			<dl class="dl-horizontal">
				<label>Última atualização:</label>
				<label>{{date('M j, Y H:i', strtotime($post->updated_at))}}</label>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.edit', 'Editar',array($post->id), array('class'=>'btn btn-success btn-block')) !!}
					
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
					{!! Form::submit('Excluir',['class'=>'btn btn-danger btn-block']) !!}
					
					{!! Form::close() !!}
					
				</div>
				<hr>
				<div class="col-sm-12">
					{!! Html::linkRoute('posts.index', '<< Ver todos os posts',null,array('class'=>'btn btn-primary btn-block')) !!}					
				</div>
			</div>
		</div>
	</div>
	
</div>



@endsection