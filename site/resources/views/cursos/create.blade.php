@extends('main')
@section('stylesheets')

{{!! Html::style('css/parsley.css') !!}}
 <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
 <script>
 	tinymce.init({ 
 		selector:'textarea',
 		plugins:'link code',
 		plugins:'image',
 		menubar:false
 	});
 </script>


@section('title','|Novo Curso')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Criar novo Curso</h1>
		<hr>
		{!! Form::open(array('route'=>'cursos.store','files'=>true)) !!}
		<!-- Criando o form para cadastro com collective-->
		{{ Form::label('nome:','Nome:') }}
		{{ Form::text('nome',null,array('class'=>'form-control', 'data-parsley', 'required'=>'','maxlength'=>'255'))}}

		{{ Form::label('slug','Slug:',['class'=>'form-spacing-top'])}}
		{{ Form::text('slug', null,array('class'=>'form-control', 'data-parsley', 'required'=>'','minlength'=>'5','maxlength'=>'255')) }}

		{{ Form::label('categoria','Categoria')}}
		{{Form::select('categoria_id',$cats,null,['class'=>'form-control'])}}

		{{ Form::label('descricao', ' Descrição:', ['class'=>'form-spacing-top'])}} 
		{{ Form::textarea('descricao',null, array('class'=>'form-control', 'data-parsley'))}} 

		{{Form::label('imagem','Selecione a imagem')}}
		{{Form::file('file_imagem',['array'=>'form-control'])}}

		{{Form::submit('Cadastrar', array('class'=>'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px;'))}}
		{!! Form::close() !!}


	</div>

</div>
@endsection

@section('scripts')

{{!! Html::script('js/parsley.min.js') !!}}

@endsection