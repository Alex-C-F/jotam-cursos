@extends('main')
@section('stylesheets')

{{!! Html::style('css/parsley.css') !!}}
<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

@section('title','|Novo Post')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Criar novo Post</h1>
		<hr>
		{!! Form::open(array('route'=>'posts.store','files'=>true)) !!}
		<!-- Criando o form para cadastro com collective-->
		{{ Form::label('titulo:','Titulo:') }}
		{{ Form::text('titulo',null,array('class'=>'form-control', 'data-parsley', 'required'=>'','maxlength'=>'255'))}}

		{{ Form::label('slug','Slug:',['class'=>'form-spacing-top'])}}
		{{ Form::text('slug', null,array('class'=>'form-control', 'data-parsley', 'required'=>'','minlength'=>'5','maxlength'=>'255')) }}

		{{ Form::label('texto', 'Texto:', ['class'=>'form-spacing-top'])}} 
		{{ Form::textarea('texto',null, array('class'=>'form-control', 'data-parsley'))}} 

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