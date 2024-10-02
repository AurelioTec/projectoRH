@extends('base.base');
@section('gestao')
    <div class="card">
        <div class="card-header">
            <h4>Férias</h4>
            <a href="#Cadastro" onclick="limpar()" data-bs-toggle="modal" data-bs-target="#Cadastro"><i
                    class="fa fa-circle-plus"></i></a>
        </div>
        @if (Session::has('Sucesso'))
            <script type="text/javascript">
                alert({{ session()->get('Sucesso') }});
            </script>
        @endif
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Agente</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Data inicio</th>
                        <th>Data fim</th>
                        <th>Aprovado</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($ferias as $feria)
                        <td>{{ $i++ }}</td>
                        <td>{{ $feria->funcionario->nagente }}</td>
                        <td>{{ $feria->funcionario->nomecompleto }}</td>
                        <td>{{ $feria->funcionario->categoria }}</td>
                        <td>{{ \Carbon\Carbon::parse($feria->datainicio)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($feria->datafim)->format('d/m/Y') }}</td>
                        <td>{{ $feria->aprovadopor }}</td>
                        <td>{{ $feria->estado }}</td>
                        <td>

                            <a href="#Cadastro" data-bs-toggle="modal" onclick="editar({{ $feria }})"
                                class="btn text-success" title="Editar"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('ferias.apagar', $feria->id) }}" class="btn text-danger"><i
                                    class="fa fa-trash" title="Apagar"></i></a>
                            @if ($feria->estado == 'Pendente')
                                <a href="{{ route('ferias.apovar', $feria->id) }}" class="btn text-primary"><i
                                        class="fa fa-check" title="Aprovar"></i></a>
                                <a href="{{ route('ferias.recusar', $feria->id) }}" class="btn text-warning"><i
                                        class="fa fa-circle-xmark" title="Recusar"></i></a>
                            @endif
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="Cadastro" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Cadastrar Férias
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id">

                            <div class="form-group">
                                <label for="funcioid">Funcionário</label>
                                <select name="funcioid" id="funcioid" class="form-control">
                                    @foreach (App\Models\Funcionario::all() as $func)
                                        <option value="{{ $func->id }}">{{ $func->nomecompleto }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="datanicio">Data de inicio </label>
                                <input type="date" class="form-control" name="datainicio" id="datainicio"
                                    min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group">
                                <label for="datafim">Data de final</label>
                                <input type="date" min="{{ \Carbon\Carbon::parse() }}" class="form-control"
                                    name="datafim" id="datafim">
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var cadstro = document.getElementById('Cadastro');

        modalId.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');

            // Use above variables to manipulate the DOM
        });
    </script>
    <Script>
        function editar(valor) {
            // document.getElementById('').value=valor.id;
            $('#id').val(valor.id);
            $('#funcioid').val(valor.funcionarios_id);
            $('#datainicio').val(valor.datainicio);
            $('#datafim').val(valor.datafim);
        }

        function limpar() {
            $('#datainicio').val("");
            $('#datafim').val("");
        }
    </Script>
@endsection
