@if (Session::has('danger'))
	<div class="alert alert-danger" role="alert">
		<strong>Mensagem: </strong>{{Session::get('danger')}}
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <div class="alert alert-danger">{{ Session::get('flash_message') }}</div>
	</div>
@endif
@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Mensagem: </strong>{{Session::get('success')}}
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
	</div>
@endif

@if (count($errors) >0)
	<div class="alert alert-danger" role="alert">
		<strong>Você cometeu um erro </strong>{{Session::get('danger')}}
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		<ul>
		@foreach ($errors->all() as $error)

			<li> {{'* - '.$error}}</li>
		@endforeach
		</ul>
	</div>
@endif