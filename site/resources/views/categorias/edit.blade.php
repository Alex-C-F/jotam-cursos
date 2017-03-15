@extends('main')
@section('title','| Edit View')
@section('content')
<div class="row">
  {!! Form::model($cat, ['route'=>['categorias.update',$cat->id],'method'=>'PUT','files'=>true]) !!}
  <div class="col-md-8">
    {{Form::label('nome', 'Nome:')}}
    {{Form::text('nome',null,["class"=>'form-control input-lg'])}}

     {{Form::label('file_imagem','Atualize a sua imagem',["class"=>'form-spacing-top'])}}
    {{Form::file('file_imagem')}}

  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Criado em:</dt>
        <dd>{{date('M j, Y H:i', strtotime($cat->created_at))}}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Última atualização</dt>
        <dd>{{date('M j, Y H:i', strtotime($cat->updated_at))}}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          {{ Form::submit('Salvar dados', ['class'=>'btn btn-success btn-block'])}}
          
        </div>
        <div class="col-sm-6">
          {!! Html::linkRoute('categorias.show', 'Cancelar',array($cat->id), array('class'=>'btn btn-danger btn-block')) !!}
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>



@endsection