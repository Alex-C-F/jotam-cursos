@extends('main')
@section('title','| Cursos Cadastrados')
@section('content')
<div class="row">
	<div class="col-md-10">
		<h1>Todos os Cursos</h1>	
	</div>
	<div class="col-md-2">
		<a href="{{ route('cursos.create')}}" class="btn btn-lg btn-block btn-primary">Novo Curso</a>
	</div>
	
</div> <!-- fim row-->

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Categoria</th>
				<th>Criado em:</th>

				
			</thead>

			<tbody>
				@foreach ($cursos as $curso)
				<tr>
					<th>{{$curso->id}}</th>
					<th>{{$curso->nome}}</th>
					<th>{{substr(strip_tags($curso->descricao),'0','50')}}{{strlen(strip_tags($curso->descricao)) > 50 ? "...":""}}</th>
					@if($curso->categoria != null)
						<th>{{$curso->categoria->nome}}</th>
					@else
						<th>Categoria não definida</th>
					@endelse
					@endif
					
					<th>{{date('M j, Y H:i', strtotime($curso->created_at))}}</th>

					<td>
						{!! Html::linkRoute('cursos.show', ' Ver ',array($curso->id), array('class'=>'btn btn-success btn-block')) !!}
					</td>
					<td>
						{!! Html::linkRoute('cursos.edit', 'Editar',array($curso->id), array('class'=>'btn btn-primary btn-block')) !!}
					</td>
					<td>
						{!! Form::open(['route'=>['cursos.destroy', $curso->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
						{!! Form::submit('Excluir',['class'=>'btn btn-danger 	btn-block']) !!}
						
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
			
		</table>
		<div class="text-center">
			{!!$cursos->links();!!}
		</div>
	</div>	
</div>

@endsection