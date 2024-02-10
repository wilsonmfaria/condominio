<x-admin>
    @section('title') {{ 'Condomínio Mensal' }} @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Condomínio e contas mensais</h3>
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body p-4">
            <div id="accordion">
                <div class="card">
                    @foreach($data as $key=>$item)
                    <div class="card-header bg-light" id="headmes{{str_replace('/','',$key)}}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#colmes{{str_replace('/','',$key)}}" aria-expanded="true" aria-controls="colmes{{str_replace('/','',$key)}}">
                                Condomínio referente à {{$item['condominio']['mesAno']}} <span class="badge rounded-pill bg-{{$item['condominio']['status'] == 'PAGO' ? 'success' : ($item['condominio']['status'] == 'PENDENTE' ? 'warning' : 'danger')}}"">{{$item['condominio']['status']}}</span>
                            </button>
                        </h5>
                    </div>
                    <div id="colmes{{str_replace('/','',$key)}}" class="collapse" aria-labelledby="headmes{{str_replace('/','',$key)}}" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($item['contas'] as $conta)
                                @if($conta["descricao"] != "SERVIÇOS")
                                    <span class="h3">{{$conta["descricao"]}} @if($conta["file"])</span><a class="h4" href="/{{$conta['file']}}" target="_blank"><i class="nav-icon fas fa-file-pdf"></i></a>@endif
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <b>Leitura Anterior</b>
                                        </div>
                                        <div class="col">
                                            <b>Letura Atual</b>
                                        </div>
                                        <div class="col">
                                            <b>Consumo</b>
                                        </div>
                                        <div class="col">
                                            <b>Valor</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        {{$conta["campo1"]}}
                                        </div>
                                        <div class="col">
                                        {{$conta["campo2"]}}
                                        </div>
                                        <div class="col">
                                        {{$conta["campo3"]}}
                                        </div>
                                        <div class="col">
                                        R$ {{number_format($conta["valorPagar"], 2, ',','.')}}
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                                    <h3>SERVIÇOS</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <b>Item</b>
                                        </div>
                                        <div class="col">
                                            <b>Responsável</b>
                                        </div>
                                        <div class="col">
                                            <b>Status</b>
                                        </div>
                                        <div class="col">
                                            <b>Valor</b>
                                        </div>
                                    </div>
                            @foreach($item['contas'] as $conta)
                                @if($conta["descricao"] == "SERVIÇOS")
                                <div class="row">
                                        <div class="col">
                                        <span>{{$conta["campo1"]}} @if($conta["file"])</span><a class="text-dark" href="/{{$conta['file']}}" target="_blank"><i class="nav-icon fas fa-file-pdf"></i></a>@endif
                                        
                                        </div>
                                        <div class="col">
                                        {{$conta["campo2"]}}
                                        </div>
                                        <div class="col">
                                        {{$conta["campo3"]}}
                                        </div>
                                        <div class="col">
                                        R$ {{number_format($conta["valorPagar"], 2, ',','.')}}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="border round p-2 my-4 bg-light">
                                <h3>CUSTOS TOTAIS</h3>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <b>Total de gastos</b>
                                    </div>
                                    <div class="col">
                                        <b>Fundo de reserva</b>
                                    </div>
                                    <div class="col">
                                        <b>Custo final</b>
                                    </div>
                                    <div class="col">
                                        <b>Custo rateado</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    R$ {{number_format($item['condominio']["totalContas"], 2, ',','.')}}
                                    </div>
                                    <div class="col">
                                    R$ {{number_format($item['condominio']["caixa"], 2, ',','.')}}
                                    </div>
                                    <div class="col">
                                    R$ {{number_format($item['condominio']["totalFinal"], 2, ',','.')}}
                                    </div>
                                    <div class="col">
                                    R$ {{number_format($item['condominio']["valorPagar"], 2, ',','.')}}
                                    </div>
                                </div>
                                <hr>
                                <p class="text-danger"><strong>VALOR A PAGAR: R$ {{number_format($item['condominio']["valorPagar"], 2, ',','.')}}</strong></p>
                                <p class="text-danger"><strong>VENCIMENTO EM 20/{{$item['condominio']['mesAno']}}</strong></p>
                                <hr>
                                <div class="h5 text-center alert {{$item['condominio']['status'] == 'PAGO' ? 'alert-success' : ($item['condominio']['status'] == 'PENDENTE' ? 'alert-warning' : 'alert-danger')}}">
                                    APARTAMENTO {{$item['condominio']['apId']}} - PAGAMENTO {{$item['condominio']['status']}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-admin>