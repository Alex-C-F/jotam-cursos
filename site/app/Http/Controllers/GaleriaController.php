<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeria;
use Image;
use Storage;
use Session;

class GaleriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = Galeria::orderBy('id','asc')->paginate(10);
        return view('galerias.index')->withGalerias($fotos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'file_image' => 'sometimes|image'
            ));
        $galeria = new Galeria();
        if ($request->hasFile('file_image')) {
             $image = $request->file('file_image');
            $nomeImagem = time().'.'.$image->getClientOriginalExtension();
            $local = public_path('imagens/'.$nomeImagem);
            Image::make($image)->resize(800,400)->save($local);
            $galeria->url = $nomeImagem;
        }
        $galeria->save();
        Session::flash('success', 'Dados salvos com sucesso!');
        return redirect()->route('galerias.index',$galeria->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeria = new Galeria();
        $galeria = Galeria::find($id);
        return view('galerias.show')->withGaleria($galeria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $galeria = Galeria::find($id);
         Storage::delete($galeria->url);
        $galeria->delete();
        Session::flash('success','A Foto foi deletada com sucesso!');
        return redirect()->route('galerias.index');
    }
}
