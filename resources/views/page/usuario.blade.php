@extends('base.base');
@section('gestao')
    <div class="card">
        <div class="card-header">
            <h4>Lista de Usuário</h4>
            <a href="#Cadastro" onclick="limpar()" data-bs-toggle="modal" data-bs-target="#Cadastro"><i
                    class="fa fa-circle-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo de usuario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $use)
                        <tr>
                            <td>{{ $use->id }}</td>
                            <td>{{ $use->name }}</td>
                            <td>{{ $use->email }}</td>
                            <td>{{ $use->tipousuario }}</td>
                            <td>
                                <a href="#Cadastro" data-bs-toggle="modal" onclick="editar({{ $use }})"
                                    class="btn text-success"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('user.apagar', $use->id) }}" class="btn text-danger"><i
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
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('user.cadastrar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo Usuario</label>
                                <select name="tipousuario" id="tipo" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Funcionario">Funcionario</option>
                                </select>
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
            $('#name').val(valor.name);
            $('#email').val(valor.email);
            $('#tipo').val(valor.tipousuario);
        }

        function limpar() {
            $('#id').val("");
            $('#name').val("");
            $('#email').val("");
            $('#tipo').val("");
        }
    </Script>
@endsection
