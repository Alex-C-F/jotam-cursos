@extends('main')
@section('stylesheets')

{{!! Html::style('css/parsley.css') !!}}

@endsection

@section('title','| NotFound')
@section('content')
	<h1 class="text-center">A página não existe!</h1>
@endsection
@section('scripts')

{{!! Html::script('js/parsley.min.js') !!}}