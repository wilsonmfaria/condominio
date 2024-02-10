<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DocumentoController extends Controller
{
    public function index()
    {
        return view('admin.documentos.index');
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
