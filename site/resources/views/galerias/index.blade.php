@extends('main')
@section('title','| galerias')
@section('content')
<div class="row">
  <div class="col-md-10">
   
  </div>
   <div class="col-md-3">
      <div class="well">
        {!! Form::open(array('route'=>'galerias.store','method'=>'POST', 'files'=>true)) !!}
        <!-- Criando o form para cadastro com collective-->
        {{ Form::label('selecione:','Selecione a imagem:') }}
        {{ Form::File('file_image',['class'=>'form-control','required'=>''])}}
        {{Form::label('legenda:', 'Escreva a legenda')}}
        {{Form::text('legenda',null,['required'=>''])}}

        {{Form::submit('Adicionar', array('class'=>'btn btn-primary btn-block', 'style'=> 'margin-top:20px;'))}}
        {!! Form::close() !!}
      </div>
       
  </div>
   <div class="col-md-4 text-center">
        <h1>Todas as Imagens</h1> 
        <p>Adicionar imagens com no máximo 1.9mb e com um formato paisagem</p>
      </div>
</div> <!-- fim row-->

<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead>
        <th>#</th>
        <th>galeria</th>
        <th>Criado em:</th>
        
      </thead>

      <tbody>
        @foreach ($galerias as $galeria)
        <tr>
          <th>{{$galeria->id}}</th>
          <th><a href="{{route('galerias.show',$galeria->id)}}"><img class="img-responsive" src="{{asset('site/public/imagens/' . $galeria->url)}}" height="100" width="200" alt="Algo" /></a>
          <th>{{date('M j, Y H:i', strtotime($galeria->created_at))}}</th>

          <td>
            {!! Html::linkRoute('galerias.show', ' Ver ',array($galeria->id), array('class'=>'btn btn-success btn-block')) !!}
          </td>
          
          <td>
            {!! Form::open(['route'=>['galerias.destroy',$galeria ->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
            {!! Form::submit('Excluir',['class'=>'btn btn-danger  btn-block']) !!}
            
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
      
    </table>
    <div class="text-center">
      {!!$galerias->links()!!}
    </div>
  </div>  
</div>

@endsection