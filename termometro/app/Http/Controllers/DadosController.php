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
            $dados = Dado::whereDate('tempo', '=',$busca)->orderBy('tempo', $ord)->get();
            }
        } else {
        $dados = Dado::orderBy('tempo', 'desc')->paginate();
    }
    $graficoDia = Dado::orderBy('tempo', 'desc')->limit(7)->get();

    $resposta = json_decode($graficoDia, true); // Converte a string JSON para um array associativo

    $temperaturas = collect($resposta)->pluck('temperatura');
    $umidade = collect($resposta)->pluck('umidade');

    $tempMaxToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->max('temperatura');
    $umidMaxToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->max('umidade');

    $tempMinToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->min('temperatura');
    $umidMinToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->min('umidade');

    $tempAvgToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->avg('temperatura');
    $umidAvgToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->avg('umidade');

    $tempMaxMonth = Dado::whereMonth('tempo', '=', date('m'))->max('temperatura');
    $umidMaxMonth = Dado::whereMonth('tempo', '=', date('m'))->max('umidade');

    $tempMinMonth = Dado::whereMonth('tempo', '=', date('m'))->min('temperatura');
    $umidMinMonth = Dado::whereMonth('tempo', '=', date('m'))->min('umidade');

    $tempAvgMonth = Dado::whereMonth('tempo', '=', date('m'))->avg('temperatura');
    $umidAvgMonth = Dado::whereMonth('tempo', '=', date('m'))->avg('umidade');

    $tempCurrent = Dado::orderBy('tempo', 'desc')->limit(1)->get();

        return view('pagina.index', [
            'dados' => $dados,
            'temp' => $temperaturas,
            'umid' => $umidade,
            'tempMaxToday' => $tempMaxToday,
            'tempMinToday' => $tempMinToday,
            'tempAvgToday' => $tempAvgToday,
            'tempMaxMonth' => $tempMaxMonth,
            'tempMinMonth' => $tempMinMonth,
            'tempAvgMonth' => $tempAvgMonth,
            'umidMaxToday' => $umidMaxToday,
            'umidMinToday' => $umidMinToday,
            'umidAvgToday' => $umidAvgToday,
            'umidMaxMonth' => $umidMaxMonth,
            'umidMinMonth' => $umidMinMonth,
            'umidAvgMonth' => $umidAvgMonth,
            'tempCurrent' => $tempCurrent,
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


