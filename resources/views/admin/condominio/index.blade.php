<x-admin>
    @section('title')
        {{ 'Condomínio Mensal' }}
    @endsection
    <div class="card p-0">
        <div class="card-header">
            <h3 class="card-title">Condomínio e contas mensais</h3>
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body px-0 py-4">
            <div id="accordion">
                @foreach ($data as $key => $item)
                <div class="card m-2">
                    <div class="card-header bg-light" id="headmes{{ str_replace('/', '', $key) }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse"
                                data-target="#colmes{{ str_replace('/', '', $key) }}" aria-expanded="true"
                                aria-controls="colmes{{ str_replace('/', '', $key) }}">
                                Condomínio referente à {{ $item['condominio']['mesAno'] }} <span
                                    class="badge rounded-pill bg-{{ $item['condominio']['status'] == 'PAGO' ? 'success' : ($item['condominio']['status'] == 'PENDENTE' ? 'warning' : 'danger') }}"">{{ $item['condominio']['status'] }}</span>
                            </button>
                        </h5>
                    </div>
                    <div id="colmes{{ str_replace('/', '', $key) }}" class="collapse"
                        aria-labelledby="headmes{{ str_replace('/', '', $key) }}" data-parent="#accordion">
                        <div class="card-body">
                            <span class="h3">CONTAS</span>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm text-nowrap text-right">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Provedor</th>
                                            <th>Valor</th>
                                            <th>Documento</th>
                                            <th>Leitura Atual</th>
                                            <th>Leitura Anterior</th>
                                            <th>Consumo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item['contas'] as $conta)
                                            @if ($conta['descricao'] != 'SERVIÇOS')
                                                <tr>
                                                    <td class="text-left"><strong>{{ $conta['descricao'] }}</strong></td>
                                                    <td>R$
                                                        {{ number_format($conta['valorPagar'], 2, ',', '.') }}</td>
                                                    <td>
                                                        @if ($conta['file'])
                                                            </span><a type="button" class="btn btn-sm btn-primary"
                                                                href="/{{ $conta['file'] }}" target="_blank">Baixar
                                                                PDF</a>
                                                        @endif
                                                    </td>
                                                    <td>{{ $conta['campo1'] }}</td>
                                                    <td>{{ $conta['campo2'] }}</td>
                                                    <td>{{ $conta['campo3'] }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <h3 class="mt-4">SERVIÇOS</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm text-nowrap text-right">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap text-left">Descrição</th>
                                            <th class="text-nowrap">Custo</th>
                                            <th class="text-nowrap">Nota/Comprovante</th>
                                            <th class="text-nowrap">Responsável</th>
                                            <th class="text-nowrap">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item['contas'] as $conta)
                                            @if ($conta['descricao'] == 'SERVIÇOS')
                                                <tr>
                                                    <td class="text-left"><strong>{{ $conta['campo1'] }}</strong></td>
                                                    <td>R$ {{ number_format($conta['valorPagar'], 2, ',', '.') }}
                                                    </td>
                                                    <td>
                                                        @if ($conta['file'])
                                                            </span><a type="button" class="btn btn-sm btn-primary"
                                                                href="/{{ $conta['file'] }}" target="_blank">Baixar
                                                                PDF</a>
                                                        @endif
                                                    </td>
                                                    <td>{{ $conta['campo2'] }}</td>
                                                    <td>{{ $conta['campo3'] }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <h3 class="mt-4">CUSTOS TOTAIS</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm text-nowrap text-right">
                                    <thead>
                                        <tr>
                                            <th class=text-nowrap">Gastos Totais</th>
                                            <th class=text-nowrap">Fundo de Reserva</th>
                                            <th class=text-nowrap">Custo Total Final</th>
                                            <th class=text-nowrap">Custo Rateado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                R$
                                                {{ number_format($item['condominio']['totalContas'], 2, ',', '.') }}
                                            </td>
                                            <td>
                                                R$ {{ number_format($item['condominio']['caixa'], 2, ',', '.') }}
                                            </td>
                                            <td>
                                                R$
                                                {{ number_format($item['condominio']['totalFinal'], 2, ',', '.') }}
                                            </td>
                                            <td>
                                                R$
                                                {{ number_format($item['condominio']['valorPagar'], 2, ',', '.') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="my-4 text-center h5">
                                <p class="text-danger"><strong>VALOR A PAGAR: R$
                                        {{ number_format($item['condominio']['valorPagar'], 2, ',', '.') }}</strong>
                                </p>
                                <p class="text-danger"><strong>PIX CPF: 09160654643 <br> WILSON MISSINA FARIA</strong></p>
                                <p class="text-danger"><strong>VENCIMENTO EM
                                        26/{{ $item['condominio']['mesAno'] }}</strong></p>
                                <hr>
                                <div
                                    class="pt-4 text-center alert {{ $item['condominio']['status'] == 'PAGO' ? 'alert-success' : ($item['condominio']['status'] == 'PENDENTE' ? 'alert-warning' : 'alert-danger') }}">
                                    <p>APARTAMENTO {{ $item['condominio']['apId'] }}</p>
                                    <p><strong>PAGAMENTO {{ $item['condominio']['status'] }}</strong></p>
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
