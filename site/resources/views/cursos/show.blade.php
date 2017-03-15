@extends('main')
@section('title','| View curso')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>{{ $curso->nome }}</h1>
		<img class="img-responsive" src="{{asset('site/public/imagens/'.$curso->imagem)}}" alt="" height="400" width="800">
		<p class="lead"> {!! $curso->descricao !!}</p>
		
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Url: </label>
				<label><a href="{{ route('cursos_slug.single',$curso->slug ) }}">{{ route('cursos_slug.single',$curso->slug) }}</a></label>
			</dl>
			<dl class="dl-horizontal">
				<label>Criado em:</label>
				<label>{{date('M j, Y H:i', strtotime($curso->created_at))}}</label>
			</dl>
			<dl class="dl-horizontal">
				<label>Categoria:</label>
				<label>{{$curso->categoria->nome}}</label>
			</dl>
			<dl class="dl-horizontal">
				<label>Última atualização:</label>
				<label>{{date('M j, Y H:i', strtotime($curso->updated_at))}}</label>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('cursos.edit', 'Editar',array($curso->id), array('class'=>'btn btn-success btn-block')) !!}
					
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route'=>['cursos.destroy', $curso->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
					{!! Form::submit('Excluir',['class'=>'btn btn-danger btn-block']) !!}
					
					{!! Form::close() !!}
					
				</div>
				<hr>
				<div class="col-sm-12">
					{!! Html::linkRoute('cursos.index', '<< Ver todos os cursos',null,array('class'=>'btn btn-primary btn-block')) !!}					
				</div>
			</div>
		</div>
	</div>
	
</div>



@endsection