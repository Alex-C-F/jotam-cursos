@extends('main')
@section('stylesheets')

{{!! Html::style('css/parsley.css') !!}}

@endsection

@section('title','| NotFound')
@section('content')
	<style type="text/css">
	body { background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);}
	.error-template {padding: 40px 15px; text-align: center;}
	.error-actions {margin-top:15px;margin-bottom:15px;}
	.error-actions .btn { margin-right:10px; }'
	</style>
	<div class="container">
    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="error-template">
							<h1>404 - Não encontrada</h1>

							<div class="error-actions well well-lg">
								<p>Desculpe, a página que foi acessada não existe ou foi removida.</p>
								<a title="Return to the previous page" href="javascript:history.go(-1);" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-circle-arrow-left"></span>
									Página anterior</a>
								<a title="Home" href="/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-dashboard"></span> Página Inicial </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')

{{!! Html::script('js/parsley.min.js') !!}}