<?php

namespace App\Http\Controllers;

use App\Models\Dado;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DadosController extends Controller
{
    public function mes_post($ano, $mes) {
        $data = [];

        $data['tempMaxMonth'] = Dado::whereYear('tempo', '=', $ano)
            ->whereMonth('tempo', '=', $mes)
            ->max('temperatura');
        $data['umidMaxMonth'] = Dado::whereYear('tempo', '=', $ano)
            ->whereMonth('tempo', '=', $mes)
            ->max('umidade');

        $data['tempMinMonth'] = Dado::whereYear('tempo', '=', $ano)
            ->whereMonth('tempo', '=', $mes)
            ->min('temperatura');
        $data['umidMinMonth'] = Dado::whereYear('tempo', '=', $ano)
            ->whereMonth('tempo', '=', $mes)
            ->min('umidade');

        $data['tempAvgMonth'] = number_format(
            Dado::whereYear('tempo', '=', $ano)
                ->whereMonth('tempo', '=', $mes)
                ->avg('temperatura'),
            2
        );
        $data['umidAvgMonth'] = number_format(
            Dado::whereYear('tempo', '=', $ano)
                ->whereMonth('tempo', '=', $mes)
                ->avg('umidade'),
            2
        );
        $dadosUltimos30Dias = Dado::whereYear('tempo', $ano)
        ->whereMonth('tempo', $mes)
        ->selectRaw('DATE(tempo) as data, AVG(temperatura) as temperatura_media, AVG(umidade) as umidade_media')
        ->groupBy('data')
        ->get();
        $data['temperaturasMonth'] = collect($dadosUltimos30Dias)->pluck('temperatura_media')->map(function ($value) {
            return number_format($value, 1);
        });

        $data['tempoMonth'] = collect($dadosUltimos30Dias)->pluck('data');
        return $data;
    }
    public function mes_get() {
        $data = [];

        $data['tempMaxMonth'] = Dado::whereMonth('tempo', '=', date('m'))->max('temperatura');
        $data['umidMaxMonth'] = Dado::whereMonth('tempo', '=', date('m'))->max('umidade');

        $data['tempMinMonth'] = Dado::whereMonth('tempo', '=', date('m'))->min('temperatura');
        $data['umidMinMonth'] = Dado::whereMonth('tempo', '=', date('m'))->min('umidade');

        $data['tempAvgMonth'] = number_format(Dado::whereMonth('tempo', '=', date('m'))->avg('temperatura'), 2);
        $data['umidAvgMonth'] = number_format(Dado::whereMonth('tempo', '=', date('m'))->avg('umidade'), 2);

        $dadosUltimos30Dias = $this->ultimosdias();
        $data['temperaturasMonth'] = collect($dadosUltimos30Dias)->pluck('temperatura_media')->map(function ($value) {
            return number_format($value, 1);
        });
        $data['umidadeMonth'] = collect($dadosUltimos30Dias)->pluck('umidade_media')->map(function ($value) {
            return number_format($value, 1);
        });
        $data['tempoMonth'] = collect($dadosUltimos30Dias)->pluck('data');

        return $data;
    }
    public function dia_get(){
    // Obter a data atual
    $dataAtual = Carbon::now()->format('Y-m-d');
    // Fazer a consulta usando whereDate para obter os dados do dia atual
    $graficoDia = Dado::whereDate('tempo', '=', $dataAtual)->get();

    // Converter o resultado para um array associativo
    $resposta = json_decode($graficoDia, true);


    $data['temperaturasToday'] = collect($resposta)->pluck('temperatura');
    $data['umidadeToday'] = collect($resposta)->pluck('umidade');
    $data['tempoToday'] = collect($resposta)->pluck('tempo');


    $data['tempMaxToday'] = Dado::whereDate('tempo', '=', date('Y-m-d'))->max('temperatura');
    $data['umidMaxToday'] = Dado::whereDate('tempo', '=', date('Y-m-d'))->max('umidade');

    $data['tempMinToday'] = Dado::whereDate('tempo', '=', date('Y-m-d'))->min('temperatura');
    $data['umidMinToday'] = Dado::whereDate('tempo', '=', date('Y-m-d'))->min('umidade');

    $data['tempAvgToday'] = number_format(Dado::whereDate('tempo', '=', date('Y-m-d'))->avg('temperatura'), 2);
    $data['umidAvgToday'] = number_format(Dado::whereDate('tempo', '=', date('Y-m-d'))->avg('umidade'), 2);


    return $data;
    }
    public function dia_post($dia){
    // Fazer a consulta usando whereDate para obter os dados do dia especificado
    $graficoDia = Dado::whereDate('tempo', '=', $dia)->get();

    // Converter o resultado para um array associativo
    $resposta = json_decode($graficoDia, true);

    $data['temperaturasToday'] = collect($resposta)->pluck('temperatura');
    $data['umidadeToday'] = collect($resposta)->pluck('umidade');
    $data['tempoToday'] = collect($resposta)->pluck('tempo');

    $data['tempMaxToday'] = Dado::whereDate('tempo', '=', $dia)->max('temperatura');
    $data['umidMaxToday'] = Dado::whereDate('tempo', '=', $dia)->max('umidade');

    $data['tempMinToday'] = Dado::whereDate('tempo', '=', $dia)->min('temperatura');
    $data['umidMinToday'] = Dado::whereDate('tempo', '=', $dia)->min('umidade');

    $data['tempAvgToday'] = number_format(Dado::whereDate('tempo', '=', $dia)->avg('temperatura'), 2);
    $data['umidAvgToday'] = number_format(Dado::whereDate('tempo', '=', $dia)->avg('umidade'), 2);

    return $data;
    }
    public function ultimosdias(){
        $dataAtual = Carbon::now()->format('Y-m-d');
            // Obter a data de 15 dias atrás a partir de hoje
            $dataLimiteInferior = Carbon::now()->subDays(30)->format('Y-m-d');
            // Fazer a consulta usando whereBetween para obter os dados dos últimos 15 dias
            $dadosUltimos30Dias = Dado::whereBetween('tempo', [$dataLimiteInferior, $dataAtual])
                        ->selectRaw('DATE(tempo) as data, AVG(temperatura) as temperatura_media, AVG(umidade) as umidade_media')
                        ->groupBy('data')
                        ->get();
            return $dadosUltimos30Dias;
    }

    public function index(Request $request){



        if ($request->isMethod('POST')){
            $anoMes = $request->input('ano_mes');
            $dia = $request->input('dia');
            list($ano, $mes) = explode('-', $anoMes);
            if ($mes != null){
                $data = $this->mes_post($ano, $mes);
            }else{
                $data = $this->mes_get();
            }
            if ($dia != null){
                $data2 = $this->dia_post($dia);
            }else{
                $data2 = $this->dia_get();
            }
        } else {
            $data = $this->mes_get();
            $data2 = $this->dia_get();
    }





    $temperaturaAtual = Dado::orderBy('tempo', 'desc')->limit(1)->first();


    $temperaturaNow =  $temperaturaAtual->temperatura;
    $umidadeNow =  $temperaturaAtual->umidade;



    $mesesAnos = Dado::select(Dado::raw('YEAR(tempo) as ano, MONTH(tempo) as mes'))
    ->groupBy('ano', 'mes')
    ->orderBy('ano', 'desc') // Opcional: ordene por ano decrescente para exibir os anos mais recentes primeiro
    ->orderBy('mes', 'desc') // Opcional: ordene por ano decrescente para exibir os anos mais recentes primeiro
    ->get();
    $temperaturasToday = $umidadeToday = $tempoToday = $tempMaxToday = $umidMaxToday = $tempMinToday = $umidMinToday = $tempAvgToday = $umidAvgToday = null;
    $tempMaxMonth = $tempMinMonth = $tempAvgMonth = $umidMaxMonth = $umidMinMonth = $umidAvgMonth = $temperaturasMonth =  $tempoMonth = null;


    foreach ($data as $nomeCampo => $valor) {
        // Crie uma variável com o mesmo nome do campo e atribua o valor
        $$nomeCampo = $valor;
    }
    foreach ($data2 as $nomeCampo => $valor) {
        // Crie uma variável com o mesmo nome do campo e atribua o valor
        $$nomeCampo = $valor;
    }


        return view('pagina.index', [
            'tempToday' => $temperaturasToday,
            'umidToday' => $umidadeToday,
            'today' => $tempoToday,
            'tempMonth' => $temperaturasMonth,
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
        return redirect()->route('listagem')->with('sucesso', 'Dado deletado com sucesso!');
    }


    public function listagem(Request $request){
        if ($request->isMethod('POST')){
            $busca = $request->busca;
            $ord = $request->ord;
            if ($busca != null){
                $ord = $request->ord == 'desc' ? 'desc' : 'asc';
                $dados = Dado::whereDate('tempo', '=',$busca)->orderBy('tempo', $ord)->get();
            }elseif($ord != null){
                $dados = Dado::orderBy('tempo', $ord)->paginate();
            }
            else{
                $dados = Dado::orderBy('tempo', 'desc')->paginate();
            }
        } else {
            $dados = Dado::orderBy('tempo', 'desc')->paginate();
        }
        return view('pagina.listagem',[
            'dados' => $dados,
        ]);
    }
}


