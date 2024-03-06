<x-admin>
    @section('title') {{ 'Condomínio Mensal' }} @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Acompanhamento financeiro do condomínio.</h3>
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Mes/Ano</th>
                            <th scope="col">Crédito</th>
                            <th scope="col">Débito</th>
                            <th scope="col">Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dados as $item)
                        <tr>
                            <th scope="row">{{$item->mesAno}}</th>
                            <td class="text-green text-bold">R$ {{number_format($item->credito, 2, ',', '.')}}</td>
                            <td class="text-red text-bold">R$ {{number_format($item->debito, 2, ',', '.')}}</td>
                            <td class="text-{{$item->saldo >= 0 ? 'green' : 'red'}} text-bold">R$ {{number_format($item->saldo, 2, ',', '.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin>