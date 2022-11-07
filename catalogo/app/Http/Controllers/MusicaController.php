<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musica;
use App\Models\Artista;
use Session;    

class MusicaController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $musicas = Musica::paginate(5);
        return view('musicas/index', array('musicas' => $musicas,'busca'=>null));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request) {
        $musicas = Musica::where('nome','LIKE','%'.$request->input('busca').'%')->orwhere('artista_id','LIKE','%'.$request->input('busca').'%')->paginate(5);
        return view('musicas.index',array('musicas' => $musicas,'busca'=>$request->input('busca')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $musica = Musica::find($id);
        return view('musicas.show', array('musica'=> $musica));
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,['artista_id'=>'required']);
        $musica = new Musica();
        $musica->nome=$request->input('nome');
        $musica->datalancamento=$request->input('datalancamento');
        $musica->artista_id=$request->input('artista_id');
        $musica->álbum=$request->input('album');
      
        if($musica->save()){  
            if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $nomearquivo = md5($musica->id).".".$imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('.\img\musicas'),$nomearquivo);
        }
            return redirect('musicas');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $artistas = Artista::All();
          return view('musicas.create',array('artistas' => $artistas));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $artistas = Artista::All();
            $musica = Musica::find($id);
            return view('musicas.edit',array('musica' => $musica,'artistas' => $artistas));
      
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
                'nome' => 'required',
                'datalancamento' => 'required',
                'artista_id' => 'required',
                'álbum' => 'required',
            ]);
            $musica = Musica::find($id);
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($musica->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\musicas'),$nomearquivo);
            }
            $musica->nome = $request->input('nome');
            $musica->datalancamento = $request->input('datalancamento');
            $musica->artista_id = $request->input('artista_id');
            $musica->álbum = $request->input('álbum');
            if($musica->save()) {
                Session::flash('mensagem','Música alterada com sucesso');
                return redirect(url('musicas/'));
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
            $musica = Musica::find($id);
            if (isset($request->foto)) {
                unlink($request->foto);
                }
            $musica->delete();
            Session::flash('mensagem','Música excluída com sucesso');
            return redirect(url('musicas/'));
    }
}
