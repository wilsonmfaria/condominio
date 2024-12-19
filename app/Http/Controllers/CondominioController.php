<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Condominio;
use App\Models\Conta;
use App\Models\User;
class CondominioController extends Controller
{
    public function index()
    {
        $ap = Auth::user()->ap;
        $bl = "BL".$ap[3];
        $condominios = Condominio::where('apId',$ap)->orderBy('mesAno','desc')->get();
        $data = [];
        foreach ($condominios as $condominio){
            $contas = Conta::where('mesAno',$condominio->mesAno)->where(function ($query) use ($bl) {
                $query->where('tipoCobranca','like',"$bl%")
                      ->orWhere('tipoCobranca','like',"ALL%");
            })->get();
            $data[$condominio->mesAno] = ['condominio'=>$condominio->toArray(),'contas'=>$contas->toArray()];
        }
        return view('admin.condominio.index', compact('data'));
    }

    public function process($mes,$ano)
    {
        $mon = date("m");
        $day = date("d");
        $year = date("Y");
        // NAO PERMITIR EXECUTAR SE NAO BATER O MES E DIA
        if(intval($mon) == intval($mes) && intval($day) <= 29 && intval($ano) == $year){
            //PODE EXECUTAR
            $users = User::where('status','ATIVO')->get();
            $rateioA = User::where('status','ATIVO')->where('ap','like','%A')->count();
            $rateioB = User::where('status','ATIVO')->where('ap','like','%B')->count();
            $rateioAll = $users->count();
            
            $totalContasA = Conta::where('mesAno',$mes.'/'.$ano)->where('tipoCobranca','like','BLA%')->sum('valorPagar');
            $totalContasB = Conta::where('mesAno',$mes.'/'.$ano)->where('tipoCobranca','like','BLB%')->sum('valorPagar');
            $totalContasAll = Conta::where('mesAno',$mes.'/'.$ano)->where('tipoCobranca','like','ALL%')->sum('valorPagar');
            
            $valorPagarA = $totalContasA/$rateioA;
            $valorPagarB = $totalContasB/$rateioB;
            $valorPagarAll = $totalContasAll/($rateioA+$rateioB);

            $VFinalA = $totalContasA+$totalContasAll;
            $VFinalB = $totalContasB+$totalContasAll;

            $VRateA = $valorPagarA+$valorPagarAll;
            $VRateB = $valorPagarB+$valorPagarAll;

            Condominio::where('mesAno',$mes.'/'.$ano)->delete();

            foreach ($users as $user){
                
                if($user->ap[3]=="A"){
                    $input = new Condominio();
                    $input->mesAno = $mes.'/'.$ano;
                    $input->apId = $user->ap;
                    $input->totalContas = $VFinalA;
                    $input->caixa = 0;
                    $input->totalFinal = $VFinalA;
                    $input->valorPagar = $VRateA;
                    $input->status = 'PENDENTE';
                    $input->save();
                }
                if($user->ap[3]=="B"){
                    $input = new Condominio();
                    $input->mesAno = $mes.'/'.$ano;
                    $input->apId = $user->ap;
                    $input->totalContas = $VFinalB;
                    $input->caixa = 0;
                    $input->totalFinal = $VFinalB;
                    $input->valorPagar = $VRateB;
                    $input->status = 'PENDENTE';
                    $input->save();
                }
            }
            return \App::abort(403, "Processado com Sucesso");
        }else{
            //NAO PODE EXECUTAR
            return \App::abort(403, "Nao Autorizado");
        }

    }

    public function create()
    {
        return ;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|max:255',
        ]);

        return redirect()->route('admin.permission.index')->with('success','OK');
    }

    public function edit($id)
    {

        return view('admin.permission.edit',compact('data'));
    }

    public function destroy($id)
    {
        return redirect()->route('admin.permission.index')->with('error','Permission deleted successfully.');
    }
}
