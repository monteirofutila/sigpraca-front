@extends('layouts.template', [
    'activePage' => 'accounts',
])

@section('titulo', 'Contas')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Contas</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('home') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Finanças</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accounts.index') }}">Contas</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="card card-with-nav">
                    <div class="card-header">
                        <div class="row row-nav-line">
                            <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-4" role="tablist">
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#detalhes"
                                        role="tab" aria-selected="true">Detalhes da conta</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#transações"
                                        role="tab" aria-selected="false">Transações</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#worker" role="tab"
                                        aria-selected="false">Informações pessoais</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content mt-2 card-body">
                        <div class="tab-chat tab-pane fade show active" id="detalhes" role="tabpanel">
                            <table class="table table-hover table-striped ">
                                <thead>
                                    <tr>
                                        <th>Identificador</th>
                                        <th>Categoria</th>
                                        <th>Saldo disponivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $worker->code_number }}</td>
                                        <td>{{ $account->data->category->name }} </td>
                                        <td>{{ number_format($account->data->balance, 2, ',', '.') }}
                                        </td>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade table-responsive" id="transações" role="tabpanel">
                            @if($transactions != [])
                                <table id="add-row" class="table table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th>Número de operação</th>
                                            <th>Descrição</th>
                                            <th>Montante</th>
                                            <th>Saldo anterior</th>
                                            <th>Saldo posterior</th>
                                            <th>Data</th>
                                            <th styl e="width: 10%">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $value)
                                            <tr>
                                                <td>{{ '#'.$value->code_number }}</td>
                                                <td>{{ $value->description }}</td>
                                                <td>{{ number_format($value->amount, 2, ',', '.') }}
                                                </td>
                                                <td>{{ $value->previous_balance }}</td>
                                                <td>{{ $value->current_balance }}</td>
                                                <td>{{ date('d/m/Y H:m:s', strtotime($value->created_at)) }}
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('reports.transaction', $value->id) }}"
                                                            data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Imprimir comprovativo">
                                                            <i class="fa fa-print"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="mx-auto text-center p-5">
                                    <i class="fas fa-info"></i>
                                    <p class="p-0 m-0 text-muted">Nenhuma transação registrada</p>
                                </div>
                            @endif
                        </div>
                        <div class="tab-chat tab-pane fade show" id="worker" role="tabpanel">
                            <form action="" method="POST">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" name="nome"
                                                value="{{ $worker->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $worker->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Telefone</label>
                                            <input type="tel" class="form-control" name="email"
                                                value="{{ $worker->phone_mobile }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Data de nascimento</label>
                                            <input type="text" class="form-control" id="datepicker"
                                                name="data_nascimento" value="{{ date('d/m/Y', strtotime($worker->date_birth)) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Bilhete</label>
                                            <input type="text" class="form-control" name="mae"
                                                value="{{ $worker->bi }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Género</label>
                                            <input type="text" class="form-control"
                                                value="{{ $worker->gender == 'M' ? 'Masculino' : 'Feminino' }}"
                                                name="genero">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>País</label>
                                            <input type="text" class="form-control" id="datepicker"
                                                name="data_nascimento" value="{{ $worker->address->address_country }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Cidade</label>
                                            <input type="text" class="form-control" value="{{ $worker->address->address_city }}"
                                                name="estado_civil">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control" value="{{ $worker->address->address_street }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-profile">
                    <div class="card-header" style="background-image: url('../../assets/img/blogpost.jpg');">
                        <div class="profile-picture">
                            <div class="avatar avatar-xl">
                                <img src="{{ $worker->photo }}" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-profile text-center">
                            <div class="name">{{ $worker->name }}</div>
                            <div class="job">
                                {{ $worker->gender == 'M' ? 'Masculino' : 'Feminino' }}
                            </div>
                            <div class="job">
                                {{ date('d/m/Y', strtotime($worker->date_birth)) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- Datatables -->
@push('js')
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#add-row').DataTable({
                "pageLength": 20,
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing": "Processando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "Não foram encontrados resultados",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix": "",
                    "sSearch": "Pesquisar:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext": "Seguinte",
                        "sLast": "Último"
                    }
                }
            });
        });

    </script>
@endpush
