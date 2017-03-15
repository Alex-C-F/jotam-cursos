@extends('main')
@section('title','| View Show')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Nome da categoria</h1>
		<p class="lead">{{$cat->nome }}</p>
		<img class="img-responsive" src="{{asset('site/public/imagens/' . $cat->url)}}" height="400" width="800" alt="Algo" />
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Criado em:</label>
				<label>{{date('M j, Y H:i', strtotime($cat->created_at))}}</label>
			</dl>
			<dl class="dl-horizontal">
				<label>Última atualização:</label>
				<label>{{date('M j, Y H:i', strtotime($cat->updated_at))}}</label>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('categorias.edit', 'Editar',array($cat->id), array('class'=>'btn btn-success btn-block')) !!}
					
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route'=>['categorias.destroy',$cat->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
					{!! Form::submit('Excluir',['class'=>'btn btn-danger btn-block']) !!}
					
					{!! Form::close() !!}
					
				</div>
				<hr>
				<div class="col-sm-12">
					{!! Html::linkRoute('categorias.index', '<< Ver todos os categorias',null,array('class'=>'btn btn-primary btn-block')) !!}					
				</div>
			</div>
		</div>
	</div>
	
</div>



@endsection