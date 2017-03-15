
@extends('main')
@section('title','| Slides')
@section('content')
<div class="row">
  <div class="col-md-10">
   
  </div>
   <div class="col-md-3">
      <div class="well">
        {!! Form::open(array('route'=>'slides.store','method'=>'POST', 'files'=>true)) !!}
        <!-- Criando o form para cadastro com collective-->
        {{ Form::label('selecione:','Selecione a imagem:') }}
        {{ Form::File('file_image',['class'=>'form-control'])}}

        {{Form::submit('Nova', array('class'=>'btn btn-primary btn-block', 'style'=> 'margin-top:20px;'))}}
        {!! Form::close() !!}
      </div>
       
  </div>
   <div class="col-md-4 text-center">
        <h1>Todas os Slides</h1> 
      </div>
</div> <!-- fim row-->

<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead>
        <th>#</th>
        <th>Slide</th>
        <th>Criado em:</th>
        
      </thead>

      <tbody>
        @foreach ($slides as $slide)
        <tr>
          <th>{{$slide->id}}</th>
          <th><a href="{{route('slides.show',$slide->id)}}"><img class="img-responsive" src="{{asset('imagens/' . $slide->url)}}" height="100" width="200" alt="Algo" /></a></th>
          <th>{{date('d/m/Y H:i:s', strtotime($slide->created_at))}}</th>

          <td>
            {!! Html::linkRoute('slides.show', ' Ver ',array($slide->id), array('class'=>'btn btn-success btn-block')) !!}
          </td>
          <td>
            {!! Form::open(['route'=>['slides.destroy',$slide ->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
            {!! Form::submit('Excluir',['class'=>'btn btn-danger  btn-block']) !!}
            
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
      
    </table>
    <div class="text-center">
      {!!$slides->links()!!}
    </div>
  </div>  
</div>

@endsection