<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;
use Session;    

class ArtistaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $artistas = Artista::paginate(5);
        return view('artistas/index', array('artistas' => $artistas,'busca'=>null));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request) {
        $artistas = Artista::where('nomeartistico','LIKE','%'.$request->input('busca').'%')->paginate(5);
        return view('artistas.index',array('artistas' => $artistas,'busca'=>$request->input('busca')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $artista = Artista::find($id);
        return view('artistas.show', array('artista'=> $artista));
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $artista = new Artista();
        $artista->nomecompleto=$request->input('nomecompleto');
        $artista->nomeartistico=$request->input('nomeartistico');
        $artista->idade=$request->input('idade');
        $artista->pais=$request->input('pais');
        if($artista->save()){
            if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $nomearquivo = md5($artista->id).".".$imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('.\img\artistas'),$nomearquivo);
        }
            return redirect('artistas');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('artistas.create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $artista = Artista::find($id);
            return view('artistas.edit',array('artista' => $artista));
      
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
            $this->validate($request,[
                'nomecompleto' => 'required',
                'nomeartistico' => 'required',
                'idade' => 'required',
                'pais' => 'required',
            ]);
            $artista = Artista::find($id);
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($artista->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\artistas'),$nomearquivo);
            }
            $artista->nomecompleto = $request->input('nomecompleto');
            $artista->nomeartistico = $request->input('nomeartistico');
            $artista->idade = $request->input('idade');
            $artista->pais = $request->input('pais');
            if($artista->save()) {
                Session::flash('mensagem','Artista alterado com sucesso');
                return redirect(url('artistas/'));
            }
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
            $artista = Artista::find($id);
            if (isset($request->foto)) {
                unlink($request->foto);
                }
            $artista->delete();
            Session::flash('mensagem','Artista excluído com sucesso');
            return redirect(url('artistas/'));
    }
}


