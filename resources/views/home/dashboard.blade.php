@extends('layouts.template')

@section('titulo', 'Dashboard')
@section('content')
    <div class="container">
        <div class="panel-header bg-warning-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        <h5 class="text-white op-7 mb-2">Sistema de gerenciamento de praças</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="#" class="btn btn-white btn-border btn-round mr-2">Creditar</a>
                        <a href="#" class="btn btn-warning btn-round">Debitar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-8">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Estatísticas gerais</div>
                            <div class="card-category">Informações diárias sobre estatísticas no sistema</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Usuários</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Transações</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Trabalhadores</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning full-height">
                        <div class="card-header">
                            <div class="card-title">Saldo diários</div>
                            <div class="card-category">Março 25 - Abril 02</div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="mb-4 mt-2">
                                <h1>$4,578.58</h1>
                            </div>
                            <div class="pull-in">
                                <canvas id="dailySalesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
