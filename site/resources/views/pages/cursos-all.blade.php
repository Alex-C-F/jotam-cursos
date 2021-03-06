@extends('main')

@section('title','| Cursos')

@section('content')
<style type="text/css">
	.cuadro_intro_hover{
        padding: 0px;
		position: relative;
		overflow: hidden;
		height: 200px;
	}
	.cuadro_intro_hover:hover .caption{
		opacity: 1;
		transform: translateY(-150px);
		-webkit-transform:translateY(-150px);
		-moz-transform:translateY(-150px);
		-ms-transform:translateY(-150px);
		-o-transform:translateY(-150px);
	}
	.cuadro_intro_hover img{
		z-index: 4;
	}
	.cuadro_intro_hover .caption{
		position: absolute;
		top:150px;
		-webkit-transition:all 0.3s ease-in-out;
		-moz-transition:all 0.3s ease-in-out;
		-o-transition:all 0.3s ease-in-out;
		-ms-transition:all 0.3s ease-in-out;
		transition:all 0.3s ease-in-out;
		width: 100%;
	}
	.cuadro_intro_hover .blur{
		background-color: rgba(0,0,0,0.7);
		height: 300px;
		z-index: 5;
		position: absolute;
		width: 100%;
	}
	.cuadro_intro_hover .caption-text{
		z-index: 10;
		color: #fff;
		position: absolute;
		height: 300px;
		text-align: center;
		top:-20px;
		width: 100%;
	}
</style>

<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<hr>

       
 <div class="row text-center">
 	<h1>Cursos básicos e profissionalizantes</h1>
 </div>
 <hr>
<div class="col-lg-3">
	<div class="cuadro_intro_hover " style="background-color:#cccccc;">
		<p style="text-align:center; margin-top:20px;">
			<img src="http://placehold.it/500x330" class="img-responsive" alt="">
		</p>
		<div class="caption">
			<div class="blur"></div>
			<div class="caption-text">
				<h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Informática</h3>
				<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
				<a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"></span></a>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-3">
	<div class="cuadro_intro_hover " style="background-color:#cccccc;">
		<p style="text-align:center; margin-top:20px;">
			<img src="http://placehold.it/500x330" class="img-responsive" alt="">
		</p>
		<div class="caption">
			<div class="blur"></div>
			<div class="caption-text">
				<h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Operador de caixa</h3>
				<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
				<a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"></span></a>
			</div>
		</div>
	</div>
</div>	
</div>
    
@endsection