@extends('base.base');
@section('gestao')
    <div class="card">
        <div class="card-header">
            <h4>Recrutamento</h4>
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
                        <th>Nome Completo</th>
                        <th>Data Nascimento</th>
                        <th>Genero</th>
                        <th>Nº BI</th>
                        <th>Categoria</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($recruta as $recrut)
                        <td>{{ $i++ }}</td>
                        <td>{{ $recrut->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($recrut->datanascimento)->format('d/m/Y')}}</td>
                        <td>{{ $recrut->genero }}</td>
                        <td>{{ $recrut->nbi }}</td>
                        <td>{{ $recrut->categoria }}</td>
                        <td>{{ $recrut->telefone }}</td>
                        <td>{{ $recrut->email }}</td>
                        <td>
                            <a href="#Cadastro" data-bs-toggle="modal" onclick="editar({{ $recrut }})"
                                class="btn text-success"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('recrutamento.apagar', $recrut->id) }}" class="btn text-danger"><i
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
                        Recrutar Funcionario
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="nome">Nome Completo</label>
                                <input type="text" class="form-control" name="nome" id="nome">
                            </div>
                            <div class="form-group">
                                <label for="datanasc">Data de nascimento</label>
                                <input type="date" class="form-control" name="datanasc" id="datanasc">
                            </div>
                            <div class="form-group">
                                <label for="genero">Genero</label>
                                <select name="genero" id="genero" class="form-control">
                                    <option value="Masculino">M</option>
                                    <option value="Femenino">F</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nbi">Nº do BI</label>
                                <input type="text" class="form-control" name="nbi" id="nbi" maxlength="14">
                            </div>
                            <div class="form-group">
                                <label for="name">Categoria</label>
                                <input type="text" class="form-control" name="categoria" id="categoria">
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="tel" class="form-control" name="telefone" id="telefone">
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
            $('#nome').val(valor.nome);
            $('#datanasc').val(valor.datanascimento);
            $('#genero').val(valor.genero);
            $('#nbi').val(valor.nbi);
            $('#telefone').val(valor.telefone);
            $('#categoria').val(valor.categoria);
            $('#email').val(valor.email);

        }

        function limpar() {
            $('#nome').val("");
            $('#datanasc').val("");
            $('#genero').val("");
            $('#nbi').val("");
            $('#telefone').val("");
            $('#categoria').val("");
            $('#email').val("");
        }
    </Script>
@endsection
