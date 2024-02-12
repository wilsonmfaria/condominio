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
        $condominios = Condominio::where('apId',Auth::user()->ap)->get();
        $data = [];
        foreach ($condominios as $condominio){
            $contas = Conta::where('mesAno',$condominio->mesAno)->get();
            $data[$condominio->mesAno] = ['condominio'=>$condominio->toArray(),'contas'=>$contas->toArray()];
        }
        return view('admin.condominio.index', compact('data'));
    }

    public function process($mes,$ano)
    {
        $contas = Conta::where('mesAno',$mes.'/'.$ano)->get();
        $users = User::where('status','ativo')->get();
        $rateio = $users->count();
        $totalContas = Conta::where('mesAno',$mes.'/'.$ano)->sum('valorPagar');
        $caixa = $totalContas*0.0;
        $totalFinal = $totalContas + $caixa;
        $valorPagar = $totalFinal/$rateio;
        Condominio::where('mesAno',$mes.'/'.$ano)->delete();
        foreach ($users as $user){
            $input = new Condominio();
            $input->mesAno = $mes.'/'.$ano;
            $input->apId = $user->ap;
            $input->totalContas = $totalContas;
            $input->caixa = $caixa;
            $input->totalFinal = $totalFinal;
            $input->valorPagar = $valorPagar;
            $input->status = 'PENDENTE';
            $input->save();
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
