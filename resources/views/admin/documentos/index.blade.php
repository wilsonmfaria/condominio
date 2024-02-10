<x-admin>
    @section('title') {{ 'Condomínio Mensal' }} @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Histórico de documentos e comprovantes</h3>
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body p-4">
            <div id="accordion">
                <div class="card">
                    <div class="card-header bg-light" id="headmes012024">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#colmes012024" aria-expanded="true" aria-controls="colmes012024">
                                02/2024 - Documentos referentes à FEVEREIRO de 2024
                            </button>
                        </h5>
                    </div>
                    <div id="colmes012024" class="collapse show" aria-labelledby="headmes012024" data-parent="#accordion">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>