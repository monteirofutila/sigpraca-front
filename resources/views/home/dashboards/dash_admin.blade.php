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
                    <a href="{{ route('transactions.credit') }}"
                        class="btn btn-white btn-border btn-round mr-2">
                        <i class="fa fa-plus"></i>
                        Creditar
                    </a>
                    <a href="{{ route('transactions.debit') }}" class="btn btn-secondary btn-round">
                        <i class="fa fa-plus"></i>
                        Debitar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-7">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Estatísticas gerais</div>
                        <div class="card-category">Informações diárias sobre estatísticas no sistema</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1"></div>
                                <h6 class="fw-bold mt-3 mb-0">Usuários</h6>
                            </div>
                            <div class="px-2 pb-2pb-md-0 text-center">
                                <div id="circles-2"></div>
                                <h6 class="fw-bold mt-3 mb-0">Créditos</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-3"></div>
                                <h6 class="fw-bold mt-3 mb-0">Débitos</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-4"></div>
                                <h6 class="fw-bold mt-3 mb-0">Transações</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-5"></div>
                                <h6 class="fw-bold mt-3 mb-0">Vendedores</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-warning full-height">
                    <div class="card-header">
                        <div class="card-title">Saldo diários</div>
                        <div class="card-category">Março 25 - Abril 02</div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="mb-4 mt-2">
                            <h1>AOA 4.578,58</h1>
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

@push('js')
    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
    <script>
        Circles.create({
            id: 'circles-1',
            radius: 45,
            value: "{{ $stast->data->users_count }}",
            maxValue: "{{ $stast->data->users_count }}",
            width: 7,
            text: "{{ $stast->data->users_count }}",
            colors: ['#f1f1f1', '#FF9E27'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-2',
            radius: 45,
            value: "{{ $stast->data->credits_count }}",
            maxValue: "{{ $stast->data->transactions_count }}",
            width: 7,
            text: "{{ $stast->data->credits_count }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-3',
            radius: 45,
            value: "{{ $stast->data->debits_count }}",
            maxValue: "{{ $stast->data->transactions_count }}",
            width: 7,
            text: "{{ $stast->data->debits_count }}",
            colors: ['#f1f1f1', '#333333'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-4',
            radius: 45,
            value: "{{ $stast->data->transactions_count }}",
            maxValue: "{{ $stast->data->transactions_count }}",
            width: 7,
            text: "{{ $stast->data->transactions_count }}",
            colors: ['#f1f1f1', '#412973'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-5',
            radius: 45,
            value: "{{ $stast->data->workers_count }}",
            maxValue: "{{ $stast->data->workers_count }}",
            width: 7,
            text: "{{ $stast->data->workers_count }}",
            colors: ['#f1f1f1', '#F25961'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

        var mytotalIncomeChart = new Chart(totalIncomeChart, {
            type: 'bar',
            data: {
                labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
                datasets: [{
                    label: "Total Income",
                    backgroundColor: '#ff9e27',
                    borderColor: 'rgb(23, 125, 255)',
                    data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: false //this will remove only the label
                        },
                        gridLines: {
                            drawBorder: false,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false
                        }
                    }]
                },
            }
        });

        $('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#ffa534',
            fillColor: 'rgba(255, 165, 52, .14)'
        });

    </script>
    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
    <script>
        var dailySalesChart = document.getElementById('dailySalesChart').getContext('2d');
        var myDailySalesChart = new Chart(dailySalesChart, {
            type: 'line',
            data: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September"
                ],
                datasets: [{
                    label: "Sales Analytics",
                    fill: !0,
                    backgroundColor: "rgba(255,255,255,0.2)",
                    borderColor: "#fff",
                    borderCapStyle: "butt",
                    borderDash: [],
                    borderDashOffset: 0,
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    pointHitRadius: 5,
                    data: [65, 59, 80, 81, 56, 55, 40, 35, 30]
                }]
            },
            options: {
                maintainAspectRatio: !1,
                legend: {
                    display: !1
                },
                animation: {
                    easing: "easeInOutBack"
                },
                scales: {
                    yAxes: [{
                        display: !1,
                        ticks: {
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "bold",
                            beginAtZero: !0,
                            maxTicksLimit: 10,
                            padding: 0
                        },
                        gridLines: {
                            drawTicks: !1,
                            display: !1
                        }
                    }],
                    xAxes: [{
                        display: !1,
                        gridLines: {
                            zeroLineColor: "transparent"
                        },
                        ticks: {
                            padding: -20,
                            fontColor: "rgba(255,255,255,0.2)",
                            fontStyle: "bold"
                        }
                    }]
                }
            }
        });

    </script>
@endpush
