@extends('main')
@section('title','| Posts cadasthados')
@section('content')
<div class="row">
	<div class="col-md-10">
		<h1>Todos os Posts</h1>	
	</div>
	<div class="col-md-2">
		<a href="{{ route('posts.create')}}" class="btn btn-lg btn-block btn-primary">Novo Post</a>
	</div>
	
</div> <!-- fim row-->

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Titulo</th>
				<th>Texto</th>
				<th>Criado em:</th>
				
			</thead>

			<tbody>
				@foreach ($posts as $post)
				<tr>
					<th>{{$post->id}}</th>
					<th>{{$post->titulo}}</th>
					<th>{{substr(strip_tags($post->texto),'0','50')}}{{strlen(strip_tags($post->texto)) > 50 ? "...":""}}</th>
					<th>{{date('M j, Y H:i', strtotime($post->created_at))}}</th>

					<td>
						{!! Html::linkRoute('posts.show', ' Ver ',array($post->id), array('class'=>'btn btn-success btn-block')) !!}
					</td>
					<td>
						{!! Html::linkRoute('posts.edit', 'Editar',array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
					</td>
					<td>
						{!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
						{!! Form::submit('Excluir',['class'=>'btn btn-danger 	btn-block']) !!}
						
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
			
		</table>
		<div class="text-center">
			{!!$posts->links();!!}
		</div>
	</div>	
</div>

@endsection