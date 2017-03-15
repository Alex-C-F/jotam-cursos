<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Storage;
use Session;
use App\Slide;

class SlidesController extends Controller
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
         $slide = Slide::orderBy('id','asc')->paginate(10);
        return view('slides.index')->withslides($slide);
    }

    public function store(Request $request)
    {
        $slide = new Slide();
        $this->validate($request, array(
            'file_image' => 'sometimes|image'
            ));
        $slide = new Slide();
        if ($request->hasFile('file_image')) {
             $image = $request->file('file_image');
            $nomeImagem = time().'.'.$image->getClientOriginalExtension();
            $local = public_path('imagens/'.$nomeImagem);
            Image::make($image)->resize(800,400)->save($local);
            $slide->url = $nomeImagem;
        }
        $slide->save();
        Session::flash('success', 'Dados salvos com sucesso!');
        return redirect()->route('slides.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = new Slide();
        $slide = Slide::find($id);
        return view('slides.show')->withslide($slide);
    }

    public function destroy($id)
    {
         $slide = Slide::find($id);
         Storage::delete($slide->url);
        $slide->delete();
        Session::flash('success','A Foto foi deletada com sucesso!');
        return redirect()->route('slides.index');
    }
}
