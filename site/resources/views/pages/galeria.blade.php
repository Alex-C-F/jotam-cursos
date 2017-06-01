@extends('main')

@section('stylesheets')

{!! Html::style('css/demo.css') !!}
{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/style.css') !!}
{!! Html::style('css/elastislide.css') !!}

@section('title ','| Galeria')
@section('content')
	
		<style type="text/css">

			.es-carousell{
				 width: 100%;
				  height: 12%;
				  display: block;
				  margin: 0 auto;
				background:#111;
			}
			.es-carousell ul{
				display:none;
			}
			.es-carousell ul li{
				height:100%;
				float:left;
				display:block;
			}
			.es-carousell ul li a{
				display:block;
				border-style:solid;
				border-color:#222;
				opacity:0.8;
				-webkit-touch-callout:none;
				/* option */
				-webkit-transition: all 0.2s ease-in-out;
				-moz-transition: all 0.2s ease-in-out;
				-o-transition: all 0.2s ease-in-out;
				-ms-transition: all 0.2s ease-in-out;
				transition: all 0.2s ease-in-out;
			}
			.es-carousell ul li.selected a{
				border-color:#fff;
				opacity:1.0;
			}
			.es-carousell ul li a img{
				display:block;
				border:none;
				max-height:100%;
				max-width:100%;
			}
			.texto {color:#B000FF;}
		</style>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
		<noscript>
			<style>
				.es-carousel ul{
					display:block;
				}
			</style>
		</noscript>
		<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			<div class="rg-image-wrapper">
				
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
		
				<div class="rg-image"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
				</div>
			</div>
		</script>
				<div id="rg-gallery" class="rg-gallery">
					<div class="rg-thumbs">
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class="es-carousel-wrapper">
							<div class="es-nav">
								<span class="es-nav-prev">Próxima</span>
								<span class="es-nav-next">Anterior</span>
							</div>
							<div class="es-carousell">
								<ul>
									@foreach ($galerias as $galeria)
									<li><a href="#"><img src="{{asset('site/public/imagens/' . $galeria->url)}}" data-large="{{asset('site/public/imagens/' . $galeria->url)}}" alt="image01" data-description= "{{$galeria->legenda}}" height="65" width="65" /></a></li>
									@endforeach
								</ul>
							</div>
						</div>
						<!-- End Elastislide Carousel Thumbnail Viewer -->
					</div><!-- rg-thumbs -->
				</div><!-- rg-gallery -->
				
		<!-- Scripts-->
@endsection

@section('scripts')

{!! Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js') !!}
{!! Html::script('js/jquery.tmpl.min.js') !!}
{!! Html::script('js/jquery.easing.1.3.js') !!}
{!! Html::script('js/jquery.elastislide.js') !!}
{!! Html::script('js/gallery.js') !!}
@endsection