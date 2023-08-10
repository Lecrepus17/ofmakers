<?php

namespace App\Http\Controllers;

use App\Models\Dado;
use Illuminate\Http\Request;
use Carbon\Carbon;

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


    // Obter a data atual
    $dataAtual = Carbon::now()->format('Y-m-d');

    // Fazer a consulta usando whereDate para obter os dados do dia atual
    $graficoDia = Dado::whereDate('tempo', '=', $dataAtual)->get();

    // Converter o resultado para um array associativo
    $resposta = json_decode($graficoDia, true);

    $temperaturaAtual = Dado::orderBy('tempo', 'desc')->limit(1)->first();


    // Obter a data de 15 dias atrás a partir de hoje
    $dataLimiteInferior = Carbon::now()->subDays(15)->format('Y-m-d');

    $temperaturaNow =  $temperaturaAtual->temperatura;


    // Fazer a consulta usando whereBetween para obter os dados dos últimos 15 dias
    $dadosUltimos15Dias = Dado::whereBetween('tempo', [$dataLimiteInferior, $dataAtual])
                            ->selectRaw('DATE(tempo) as data, AVG(temperatura) as temperatura_media, AVG(umidade) as umidade_media')
                            ->groupBy('data')
                            ->get();

    $temperaturasToday = collect($resposta)->pluck('temperatura');
    $umidadeToday = collect($resposta)->pluck('umidade');
    $tempoToday = collect($resposta)->pluck('tempo');


    $temperaturasMonth = collect($dadosUltimos15Dias)->pluck('temperatura_media')->map(function ($value) {
        return number_format($value, 1);
    });

    $umidadeMonth = collect($dadosUltimos15Dias)->pluck('umidade_media')->map(function ($value) {
        return number_format($value, 1);
    });
    $tempoMonth = collect($dadosUltimos15Dias)->pluck('data');


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

        return view('pagina.index', [
            'dados' => $dados,
            'tempToday' => $temperaturasToday,
            'umidToday' => $umidadeToday,
            'today' => $tempoToday,
            'tempMonth' => $temperaturasMonth,
            'umidMonth' => $umidadeMonth,
            'month' => $tempoMonth,
            'temperaturaNow' => $temperaturaNow,
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
        ]);}
    // mostra mais especifica de datas
    public function view(Dado $dado){
        return view('Dados.view',[
            'dado' => $dado
        ]);
    }

    // caso realmente precise deletar
    public function delete(Dado $dado){
        $dado->delete();
        return redirect()->route('index')->with('sucesso', 'Dado deletado com sucesso!');
    }
}


