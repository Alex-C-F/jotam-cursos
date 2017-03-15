<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Categoria;

class Cursos_slugController extends Controller
{
    public function getIndex(){
     
		$cursos = Curso::paginate(20);
		return view('cursos_slug.index')->withCursos($cursos);
	}

    public function getSingle($slug){
    	//fetch from the based on slug
    	$curso = Curso::where('slug','=',$slug)->first();
    	//return $post->slug;
    	return view('cursos_slug.single')->with('curso',$curso);
    }
}
