<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Session;
use Storage;
use Image;

class CategoriaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
      $categorias = Categoria::orderBy('id','des')->paginate(6);
      return view('categorias.index')->withCategorias($categorias);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valida
        $this->validate( $request, array(
            'nome'=>'required|max:255',
            'file_imagem' => 'sometimes|image'
        ));
        //armazena
        $cat = new Categoria();
        $cat->nome = $request->nome;
        //adiciona imagem
        if($request->hasFile('file_imagem')){
            $image = $request->file('file_imagem');
            $nomeImagem = time().'.'.$image->getClientOriginalExtension();
            $local = public_path('imagens/'.$nomeImagem);
            Image::make($image)->resize(800,400)->save($local);
            $cat->url = $nomeImagem;
        }
        $cat->save();
        Session::flash('success', 'Dados salvos com sucesso!');
        //redireciona
        return redirect()->route('categorias.index',$cat->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $cat = new Categoria();
        $cat = Categoria::find($id);
        return view('categorias.show')->withCat($cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $cat = new Categoria();
        $cat = Categoria::find($id);

        return view('categorias.edit')->withCat($cat);
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
         //busca
        $cat = Categoria::find($id);
        //valida dados
        $this->validate($request, array(
            'nome'=>'required|max:255',
            'file_imagem'=>'sometimes|image'
            ));
        //captura dados e salva
        $cat->nome = $request->input('nome');
         if ($request->hasFile ('file_imagem')) {
            //adiciona a nova fot
            $image = $request->file('file_imagem');
            $nomeImagem = time().'.'.$image->getClientOriginalExtension();
            $local = public_path('imagens/'.$nomeImagem);
            Image::make($image)->resize(800,400)->save($local);
            $imagemAntiga = $cat->url;
            //atualiza o banco de dados
            $cat->url = $nomeImagem;
            //deleta a outra foto
            Storage::delete($imagemAntiga);
        }
        $cat->save();
        Session::flash('success','Dados alterados com sucesso!');
        //redireciona
        return redirect()->route('categorias.show',$cat->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        Storage::delete($categoria->url);
        $categoria->delete();
        Session::flash('success','Deletado com sucesso!');
        return redirect()->route('categorias.index');
    }
}
