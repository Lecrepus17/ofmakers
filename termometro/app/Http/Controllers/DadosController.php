<?php

namespace App\Http\Controllers;

use App\Models\Dado;
use Illuminate\Http\Request;

class DadosController extends Controller
{

    public function index(Request $request){
        if ($request->isMethod('POST')){
            $ord = $request->ord == 'desc' ? 'desc' : 'asc';
            $busca = $request->busca;
            if ($busca == ""){
            $dados = Dado::orderBy('tempo', $ord)->paginate();
            }else{
            $dados = Dado::whereDate('tempo', '=',$busca)->orderBy('tempo', $ord)->paginate();
            }
        } else {
        $dados = Dado::orderBy('tempo', 'desc')->paginate();
    }
    $graficoDia = Dado::orderBy('tempo', 'desc')->limit(7)->get();

    $resposta = json_decode($graficoDia, true); // Converte a string JSON para um array associativo

    $temperaturas = collect($resposta)->pluck('temperatura');
    $umidade = collect($resposta)->pluck('umidade');

        return view('pagina.index', [
            'dados' => $dados,
            'temp' => $temperaturas,
            'umid' => $umidade
        ]);}
    // mostra mais especifica de datas
    public function view(Dado $dado){
        return view('Dados.view',[
            'dado' => $dado
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


