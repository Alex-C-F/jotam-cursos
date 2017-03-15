@extends('main')
@section('title','| Edit Curso')

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

@section('content')
<div class="row">
  {!! Form::model($curso, ['route'=>['cursos.update',$curso->id],'method'=>'PUT','files'=>true]) !!}
  <div class="col-md-8">
    {{Form::label('nome', 'Nome:')}}
    {{Form::text('nome',null,["class"=>'form-control input-lg'])}}

    {{Form::label('slug', 'Slug:')}}
    {{Form::text('slug',null,["class"=>'form-control input-lg'])}}

    {{ Form::label('categoria','Categoria')}}
    {{Form::select('categoria_id',$cats,null,['class'=>'form-control'])}}
    
    {{Form::label('descricao', 'Descrição:',["class"=>'form-spacing-top'])}}
    {{Form::textarea("descricao", null, ["class"=>'form-control'])}}

     {{Form::label('file_imagem','Atualize a sua imagem',["class"=>'form-spacing-top'])}}
    {{Form::file('file_imagem')}}

    
  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Criado em:</dt>
        <dd>{{date('M j, Y H:i', strtotime($curso->created_at))}}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Última atualização</dt>
        <dd>{{date('M j, Y H:i', strtotime($curso->updated_at))}}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          {{ Form::submit('Salvar dados', ['class'=>'btn btn-success btn-block'])}}
          
        </div>
        <div class="col-sm-6">
          {!! Html::linkRoute('cursos.show', 'Cancelar',array($curso->id), array('class'=>'btn btn-danger btn-block')) !!}
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>



@endsection