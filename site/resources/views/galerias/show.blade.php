@extends('main')
@section('title','| View Show')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Url da Imagem</h1>
		<p class="lead">{{$galeria->url }}</p>
		<img class="img-responsive" src="{{asset('site/public/imagens/' . $galeria->url)}}" height="400" width="800"/>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Criado em:</label>
				<label>{{date('M j, Y H:i', strtotime($galeria->created_at))}}</label>
			</dl>
			<dl class="dl-horizontal">
				<label>Última atualização:</label>
				<label>{{date('M j, Y H:i', strtotime($galeria->updated_at))}}</label>
			</dl>
			<hr>
			<div class="row">
				
				<div class="col-sm-6">
					{!! Form::open(['route'=>['galerias.destroy',$galeria->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
					{!! Form::submit('Excluir',['class'=>'btn btn-danger btn-block']) !!}
					
					{!! Form::close() !!}
					
				</div>
				<hr>
				<div class="col-sm-12">
					{!! Html::linkRoute('galerias.index', '<< Ver todos os galeriaegorias',null,array('class'=>'btn btn-primary btn-block')) !!}					
				</div>
			</div>
		</div>
	</div>
	
</div>



@endsection