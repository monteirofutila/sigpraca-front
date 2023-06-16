@extends('layouts.template')

@section('titulo', 'Transações')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Transações</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
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
                    <a href="#">Transações</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="ml-auto">
                                <a href="{{ route('transactions.credit') }}"
                                    class="btn btn-warning btn-border btn-round ">
                                    <i class="fa fa-plus"></i>
                                    Creditar
                                </a>
                                <a href="{{ route('transactions.debit') }}"
                                    class="btn btn-warning btn-round">
                                    <i class="fa fa-plus"></i>
                                    Debitar
                                </a>
                                <button onclick="imprimirFactura()" class="btn btn-warning btn-round">
                                    <i class="fa fa-print"></i>
                                    Imprimir
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <embed src="data:application/pdf;base64,{{ base64_encode($pdf) }}" width="100%" height="600px">
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
                "pageLength": 5,
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

<script>
    function imprimirFactura() {
        window.print();
    }

</script>
