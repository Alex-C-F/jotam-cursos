@extends('main')
@section('title','| categorias cadastrados')
@section('content')
<div class="row">
  <div class="col-md-10">
   
  </div>
  <div class="col-md-3">
      <div class="well">
          {!! Form::open(array('route'=>'categorias.store','method'=>'POST','files'=>true)) !!}
      <!-- Criando o form para cadastro com collective-->
      {{ Form::label('nome:','Nome:') }}
      {{ Form::text('nome',null,array('class'=>'form-control', 'data-parsley', 'required'=>'','maxlength'=>'255'))}}

      {{Form::label('imagem','Selecione a imagem')}}
    {{Form::file('file_imagem',['array'=>'form-control','required'=>''])}}

      {{Form::submit('Nova', array('class'=>'btn btn-primary btn-block', 'style'=> 'margin-top:20px;'))}}
      {!! Form::close() !!}
      </div>
       
  </div>
   <div class="col-md-4 text-center">
        <h1>Todas as Categorias</h1> 
        <p>Adicionar imagens com no máximo 1.9mb e com um formato paisagem</p>
      </div>
</div> <!-- fim row-->

<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead>
        <th>#</th>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Criado em:</th>
        
      </thead>

      <tbody>
        @foreach ($categorias as $categoria)
        <tr>
          <th>{{$categoria->id}}</th>
           <th><a href="{{route('categorias.show',$categoria->id)}}"><img class="img-responsive" src="{{asset('site/public/imagens/' . $categoria->url)}}" height="100" width="200" alt="Algo" /></a>
          <th>{{substr($categoria->nome,'0','50')}}{{strlen($categoria->nome) > 50 ? "...":""}}</th>
          <th>{{date('M j, Y H:i', strtotime($categoria->created_at))}}</th>

          <td>
            {!! Html::linkRoute('categorias.show', ' Ver ',array($categoria->id), array('class'=>'btn btn-success btn-block')) !!}
          </td>
          <td>
            {!! Html::linkRoute('categorias.edit', 'Editar',array($categoria->id), array('class'=>'btn btn-primary btn-block')) !!}
          </td>
          <td>
            {!! Form::open(['route'=>['categorias.destroy',$categoria ->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
            {!! Form::submit('Excluir',['class'=>'btn btn-danger  btn-block']) !!}
            
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
      
    </table>
    <div class="text-center">
      {!!$categorias->links()!!}
    </div>
  </div>  
</div>

@endsection