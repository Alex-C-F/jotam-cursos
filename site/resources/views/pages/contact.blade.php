@extends('main')
@section('title','| Contato')
@section('content')
    	<div class="row">
        	<div class="col-lg-12">
            	<h1>Contate-me</h1>
                <hr>
               <form action="{{ url('contact')}}" method="POST">
                {{csrf_field()}}
                	<div class="form-group">
                    	<label name="email">E-mail:</label>
                        <input id="email" name="email" class="form-control" placeholder="jane.doe@example.com">
                    </div>
                    <div class="form-group">
                    	<label name="name">Nome:</label>
                        <input id="name" name="name" class="form-control" placeholder="Digite o seu nome">
                    </div>
                    <div class="form-group">
                    	<label name="subject">Assunto:</label>
                        <input id="subject" name="subject" class="form-control"  placeholder="Digite o assunto">
                    </div>
                    <textarea class="form-control" rows="5" name="message" id="message" placeholder="Insira a sua mensagem aqui..."></textarea>
                    
                    <div>
                 	 <hr>
    				<button type="submit" class="btn btn-success" value="Send Message">Enviar Mensagem</button>
   					</div>
                </form>
            	
            </div>
        	
        </div>
@endsection
   