<?php

namespace App\Http\Controllers;

use App\Models\Dado;
use Illuminate\Http\Request;

class DadosController extends Controller
{
    public function index(){
        return view('pagina.index');
    }
    // pesquisa e paginação principal
    public function index2(Request $request){
        if ($request->isMethod('POST')){
            /**
            $ord = $request->ord == 'asc' ? 'asc' : 'desc';
            $busca = $request->busca;
            $busca2 = $request->busca2;
            $dados = Dado::where('tempo', 'BETWEEN', "{$busca} AND {$busca2}")->orderBy('tempo', $ord)->paginate();
            return view('Dados.index', [
                'dados' => $dados,
            ]);*/
        } else {
        $dados = Dado::orderBy('tempo', 'desc')->paginate();

    }        dd($dados);
        return view('Dados.index', [
            'dados' => $dados,
        ]);}
    // mostra mais especifica de datas
    public function view(Dado $dado){
        return view('Dados.view',[
            'prod' => $dado
        ]);
    }
    // caso necessite deletar
    public function delete(Dado $Dado){
        return view('Dados.delete', [
            'prod' => $Dado,
        ]);
    }
    // caso realmente precise deletar
    public function deletefORrEAL(Dado $Dado){
        $Dado->delete();
        return redirect()->route('Dados')->with('sucesso', 'Dado deletado com sucesso!');
    }
}


