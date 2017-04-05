<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Galeria;
use App\Curso;
use Mail;
use Session;
use App\Categoria;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
	
	public function getIndex(){
		//$posts = new Post();
		$cursos = Curso::orderBy('created_at','des')->paginate(10);
		$posts = Post::orderBy('created_at','des')->paginate(10);
		return view('pages.welcome')->withPosts($posts)->withCursos($cursos);
	}
	
	public function getAbout(){
		$firstName = "Alex";
		$lastName = "Ferreira";
		$fullName = $firstName." ".$lastName;
		$email = "alex.cc20@hotmail.com";
		
		return view('pages.about',compact('fullName'), compact('email'));
	}
	
	public function getContact(){
		return view('pages.contact');
	}
	
	public function getGaleria(){
		$galerias = Galeria::all();
		return view('pages.galeria')->withGalerias($galerias);
	}

	/* Para envio de email, deve-se configurar o smtp no .env do projeto*/
	public function postContact(Request $request){
		$this->validate($request, array(
			'email' => 'sometimes|required|email',
			'subject'=> 'required|min:3',
			'message' => 'required|min:10'
			));
		$dados = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		);
		Mail::send('emails.contact', $dados, function($message) use ($dados){
			$message->from($dados['email']);
			$message->to('alex.cc20@hotmail.com');
			$message->subject($dados['subject']);
		});
		Session::flash('success','Obrigado por entrar em contato, sua mensagem foi enviada com sucesso!');

		return redirect('/');
	}
	public function getPacotes()
	{
		$cat = Categoria::paginate(10);
		return view('pages.pacotes')->withCategorias($cat);
	}
	//getModulos recebe o nome da categoria de cursos e envia para a view para filtrar os modulos dessa categoria
	public function getModulos($nome){
		$cursos = Curso::all();
		return view('pages.modulos')->withCategoria($nome)->withCursos($cursos);
	}
	public function postDesconto(Request $request){
		$this->validate($request, array(
			'nome' => 'required|min:6',
			'telefone'=> 'required|integer|min:8'
			));
		$dados = array(
			'email' => 'mail@hotmail.com',
			'telefone' => $request->telefone,
			'nome'=>$request->nome,
			'mensagem' => 'Quero 50% de Desconto'
		);
		Mail::send('emails.contactDesconto', $dados, function($message) use ($dados){
			$message->from($dados['email']);
			$message->to('alex.cc20@hotmail.com');
			$message->subject($dados['mensagem']);
		});
		Session::flash('success','Obrigado por entrar em contato, sua mensagem foi enviada com sucesso!');

		return redirect('/');
	}
	//Hello, this is a 
	public function getNotfound()
	{
	   return view('error.notfound');
	}

	public function getSearchPacote(Request $request){
		$this->validate($request, array(
			'busca' => 'required|min:5'
		));
		$busca = $request->busca;
		$result = DB::table('categorias')->where('nome',$busca)->first(); 
		if ($result == '') {
			Session::flash('danger','Pacote não encontrado!');
			return redirect('/pacotes/cursos');
		}
		else
		{
			return view('pages.search-pacote')->withPacote($result);
		}
		
	}

	public function getSearchCurso(Request $request){
		$this->validate($request, array(
			'busca' => 'required|min:5'
		));
		$busca = $request->busca;
		$result = DB::table('cursos')->where('nome',$busca)->first(); 
		if ($result == '') {
			Session::flash('danger','Curso não encontrado!');
			return redirect('/cursos-index');
		}
		else
		{
			return view('pages.search-curso')->withCurso($result);
		}
		
	}

}