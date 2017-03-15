<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Categoria;
use Storage;
use Image;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Cria autenticação para esse controlador
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $cursos = Curso::orderBy('id','asc')->paginate(5);
        return view('cursos.index')->withCursos($cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //obtendo todas as categorias
        $categorias = Categoria::all();
        //adicionando as categorias a um array
        $cats = array();
        foreach ($categorias as $categoria) {
            $cats[$categoria->id] = $categoria->nome;
        }
        return view('cursos.create')->withCats($cats);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validação
        $this->validate($request, array(
                'nome' => 'required|max:255',
                'descricao' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:cursos,slug',
                'categoria_id'  =>'required|integer',
                'file_imagem'   => 'sometimes|image'
            ));

        //armazenamento no banco de dados
        $curso = new Curso();
        $curso->nome =  $request->nome;
        $curso->slug =  $request->slug;
        $curso->categoria_id = $request->categoria_id;
        $curso->descricao =  $request->descricao;
        //adiciona imagem
        if($request->hasFile('file_imagem')){
            $image = $request->file('file_imagem');
            $nomeImagem = time().'.'.$image->getClientOriginalExtension();
            $local = public_path('imagens/'.$nomeImagem);
            Image::make($image)->resize(800,400)->save($local);
            $curso->imagem = $nomeImagem;
        }
        $curso->save();
        Session::flash('success', 'Dados salvos com sucesso!');
        //redirecionar para a página
        return redirect()->route('cursos.show',$curso->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //instancia um curso
        $curso = new Curso();
        //busca por id
        $curso=Curso::find($id);
        //retorna o curso para a view show
        return view('cursos.show')->with('curso',$curso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //obtendo todas as categorias
        $categorias = Categoria::all();
        $cats = array();
        foreach ($categorias as $categoria) {
            $cats[$categoria->id] = $categoria->nome;
        }
        //instancia um curso
        $curso = new Curso();
        //busca por id
        $curso=Curso::find($id);
        //retorna o curso para a view edit
        return view('cursos.edit')->withCurso($curso)->withCats($cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validação
        $curso=Curso::find($id);

        if ($request->input('slug') == $curso->slug) {
            # code...
             $this->validate($request, array(
                'nome' => 'required|max:255',
                'descricao' => 'required',
                'categoria_id'  =>'required|integer',
                'file_imagem' => 'sometimes|image'
            ));
        }else {
            # code...
             $this->validate($request, array(
                'nome' => 'required|max:255',
                'descricao' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:255',
                'categoria_id'  =>'required|integer',
                'file_imagem' => 'sometimes|image'
            ));
        }
        //armazenamento no banco de dados
        $curso =Curso::find($id);
        $curso->nome =  $request->input('nome');
        $curso->descricao =  $request->input('descricao');
        $curso->slug =  $request->input('slug');
        $curso->categoria_id = $request->input('categoria_id');
         if ($request->hasFile ('file_imagem')) {
            //adiciona a nova fot
            $image = $request->file('file_imagem');
            $nomeImagem = time().'.'.$image->getClientOriginalExtension();
            $local = public_path('imagens/'.$nomeImagem);
            Image::make($image)->resize(800,400)->save($local);
            $imagemAntiga = $curso->imagem;
            //atualiza o banco de dados
            $curso->imagem = $nomeImagem;
            //deleta a outra foto
            Storage::delete($imagemAntiga);
        }

        $curso->save();
        Session::flash('success', 'Dados alterados com sucesso!');
        //redirecionar para a página
        return redirect()->route('cursos.show',$curso->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $curso = Curso::find($id);
         Storage::delete($curso->imagem);
        $curso->delete();
        Session::flash('success','O Curso foi deletado com sucesso!');
        return redirect()->route('cursos.index');
    }
}
