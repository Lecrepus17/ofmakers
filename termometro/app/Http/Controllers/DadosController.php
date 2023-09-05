<?php

namespace App\Http\Controllers;

use App\Models\Dado;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DadosController extends Controller
{

    public function index(Request $request){

    // Obter a data atual
    $dataAtual = Carbon::now()->format('Y-m-d');

        if ($request->isMethod('POST')){
            $anoMes = $request->input('ano_mes');
            list($ano, $mes) = explode('-', $anoMes);
            $busca = $request->busca;
            $ord = $request->ord;
            if ($busca != null){
                $ord = $request->ord == 'desc' ? 'desc' : 'asc';
                $dados = Dado::whereDate('tempo', '=',$busca)->orderBy('tempo', $ord)->get();
            }elseif($ord != null){
                $dados = Dado::orderBy('tempo', $ord)->get();
            }
            else{
                $dados = Dado::orderBy('tempo', 'desc')->paginate();
            }
            if ($mes != 0){
            //$mes = $request->input('mes');
            //$ano = $request->input('ano');
            // Fazer a consulta usando whereBetween para obter os dados do mês e ano especificados
            $dadosUltimos30Dias = Dado::whereYear('tempo', $ano)
                ->whereMonth('tempo', $mes)
                ->selectRaw('DATE(tempo) as data, AVG(temperatura) as temperatura_media, AVG(umidade) as umidade_media')
                ->groupBy('data')
                ->get();
            $tempMaxMonth = Dado::whereMonth('tempo', '=', $mes)->max('temperatura');
            $umidMaxMonth = Dado::whereMonth('tempo', '=', $mes)->max('umidade');

            $tempMinMonth = Dado::whereMonth('tempo', '=', $mes)->min('temperatura');
            $umidMinMonth = Dado::whereMonth('tempo', '=', $mes)->min('umidade');

            $tempAvgMonth = number_format(Dado::whereMonth('tempo', '=', $mes)->avg('temperatura'), 2);
            $umidAvgMonth = number_format(Dado::whereMonth('tempo', '=', $mes)->avg('umidade'), 2);
            }else{
                // Obter a data de 15 dias atrás a partir de hoje
                $dataLimiteInferior = Carbon::now()->subDays(30)->format('Y-m-d');
                // Fazer a consulta usando whereBetween para obter os dados dos últimos 15 dias
                $dadosUltimos30Dias = Dado::whereBetween('tempo', [$dataLimiteInferior, $dataAtual])
                            ->selectRaw('DATE(tempo) as data, AVG(temperatura) as temperatura_media, AVG(umidade) as umidade_media')
                            ->groupBy('data')
                            ->get();
            $tempMaxMonth = Dado::whereMonth('tempo', '=', date('m'))->max('temperatura');
            $umidMaxMonth = Dado::whereMonth('tempo', '=', date('m'))->max('umidade');

            $tempMinMonth = Dado::whereMonth('tempo', '=', date('m'))->min('temperatura');
            $umidMinMonth = Dado::whereMonth('tempo', '=', date('m'))->min('umidade');

            $tempAvgMonth = number_format(Dado::whereMonth('tempo', '=', date('m'))->avg('temperatura'), 2);
            $umidAvgMonth = number_format(Dado::whereMonth('tempo', '=', date('m'))->avg('umidade'), 2);
            }
        } else {
        $dados = Dado::orderBy('tempo', 'desc')->paginate();
        // Obter a data de 15 dias atrás a partir de hoje
        $dataLimiteInferior = Carbon::now()->subDays(30)->format('Y-m-d');
        // Fazer a consulta usando whereBetween para obter os dados dos últimos 15 dias
        $dadosUltimos30Dias = Dado::whereBetween('tempo', [$dataLimiteInferior, $dataAtual])
            ->selectRaw('DATE(tempo) as data, AVG(temperatura) as temperatura_media, AVG(umidade) as umidade_media')
            ->groupBy('data')
            ->get();
            $tempMaxMonth = Dado::whereMonth('tempo', '=', date('m'))->max('temperatura');
            $umidMaxMonth = Dado::whereMonth('tempo', '=', date('m'))->max('umidade');

            $tempMinMonth = Dado::whereMonth('tempo', '=', date('m'))->min('temperatura');
            $umidMinMonth = Dado::whereMonth('tempo', '=', date('m'))->min('umidade');

            $tempAvgMonth = number_format(Dado::whereMonth('tempo', '=', date('m'))->avg('temperatura'), 2);
            $umidAvgMonth = number_format(Dado::whereMonth('tempo', '=', date('m'))->avg('umidade'), 2);
    }



    // Fazer a consulta usando whereDate para obter os dados do dia atual
    $graficoDia = Dado::whereDate('tempo', '=', $dataAtual)->get();

    // Converter o resultado para um array associativo
    $resposta = json_decode($graficoDia, true);

    $temperaturaAtual = Dado::orderBy('tempo', 'desc')->limit(1)->first();
    $umidadeAtual = Dado::orderBy('tempo', 'desc')->limit(1)->first();








    $temperaturaNow =  $temperaturaAtual->temperatura;
    $umidadeNow =  $umidadeAtual->umidade;

    $temperaturasToday = collect($resposta)->pluck('temperatura');
    $umidadeToday = collect($resposta)->pluck('umidade');
    $tempoToday = collect($resposta)->pluck('tempo');


    $temperaturasMonth = collect($dadosUltimos30Dias)->pluck('temperatura_media')->map(function ($value) {
        return number_format($value, 1);
    });

    $umidadeMonth = collect($dadosUltimos30Dias)->pluck('umidade_media')->map(function ($value) {
        return number_format($value, 1);
    });
    $tempoMonth = collect($dadosUltimos30Dias)->pluck('data');


    $tempMaxToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->max('temperatura');
    $umidMaxToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->max('umidade');

    $tempMinToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->min('temperatura');
    $umidMinToday = Dado::whereDate('tempo', '=', date('Y-m-d'))->min('umidade');

    $tempAvgToday = number_format(Dado::whereDate('tempo', '=', date('Y-m-d'))->avg('temperatura'), 2);
    $umidAvgToday = number_format(Dado::whereDate('tempo', '=', date('Y-m-d'))->avg('umidade'), 2);

    $mesesAnos = Dado::select(Dado::raw('YEAR(tempo) as ano, MONTH(tempo) as mes'))
    ->groupBy('ano', 'mes')
    ->orderBy('ano', 'desc') // Opcional: ordene por ano decrescente para exibir os anos mais recentes primeiro
    ->get();
        return view('pagina.index', [
            'dados' => $dados,
            'tempToday' => $temperaturasToday,
            'umidToday' => $umidadeToday,
            'today' => $tempoToday,
            'tempMonth' => $temperaturasMonth,
            'umidMonth' => $umidadeMonth,
            'month' => $tempoMonth,
            'umidadeNow' => $umidadeNow,
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
            'mesesAnos' => $mesesAnos,
            'selectedAnoMes' => request('ano_mes'),
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


