@extends('base.base');
@section('gestao')
    <div class="card">
        <div class="card-header">
            <h4>Lista de Funcionario</h4>
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
                        <th>img</th>
                        <th>Nº Agente</th>
                        <th>Nome completo</th>
                        <th>Cargo</th>
                        <th>Categoria</th>
                        <th>Nome de usuario </th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcio as $func)
                        <tr>
                            <td><img src="{{ asset('img/carregadas/' . $func->imagem) }}" alt="" style="width: 38px">
                            </td>
                            <td>{{ $func->nagente }}</td>
                            <td>{{ $func->nomecompleto }}</td>
                            <td>{{ $func->cargo }}</td>
                            <td>{{ $func->categoria }}</td>
                            <td>{{ $func->user->name }}</td>
                            <td>{{ $func->user->email }}</td>
                            <td>
                                <a href="#Cadastro" data-bs-toggle="modal" onclick="editar({{ $func }})"
                                    class="btn text-success"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('funcionario.apagar', $func->id) }}" class="btn text-danger"><i
                                        class="fa fa-trash"></i></a>
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
                        Cadastrar Funcionario
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="Agente">Nº Agente</label>
                                <input type="text" class="form-control" name="nagente" id="nagente">
                            </div>
                            <div class="form-group">
                                <label for="nome">imagem</label>
                                <input type="file" class="form-control" name="imagem" id="imagem">
                            </div>
                            <div class="form-group">
                                <label for="nome">Nome completo</label>
                                <input type="text" class="form-control" name="nome" id="nome">
                            </div>
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <input type="text" class="form-control" name="cargo" id="cargo">
                            </div>
                            <div class="form-group">
                                <label for="name">Categoria</label>
                                <input type="text" class="form-control" name="categoria" id="categoria">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
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
            $('#nagente').val(valor.nagente);
            $('#nome').val(valor.nomecompleto);
            $('#cargo').val(valor.cargo);
            $('#categoria').val(valor.categoria);
            $('#email').val(valor.user.email);
        }

        function limpar() {
            $('#nagente').val("");
            $('#nome').val("");
            $('#cargo').val("");
            $('#categoria').val("");
            $('#email').val("");
        }
    </Script>
@endsection
