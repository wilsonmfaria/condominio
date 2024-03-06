<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financeiro;

class FinanceiroController extends Controller
{
    public function index()
    {
        $dados = Financeiro::orderBy('id','desc')->get();
        return view('admin.financeiro.index', compact('dados'));
    }

    public function create()
    {
        return ;
    }

    public function store(Request $request)
    {

        return ;
    }

    public function edit($id)
    {

        return ;
    }

    public function destroy($id)
    {
        return ;
    }
}
