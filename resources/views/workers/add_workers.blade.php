@extends('layouts.template', [
    'activePage' => 'workers',
])

@section('titulo', 'Feirante - Novo item')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Feirantes</h4>
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
                    <a href="#">Administração</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workers.index') }}">Feirantes</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Novo item - Feirante</div>
                    </div>
                    @include('workers.forms.form_add_workers')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <!-- DateTimePicker -->
    <script src="{{ asset('assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}">
    </script>
    <!-- Select2 -->
    <script src="{{ asset('assets/js/plugin/select2/select2.full.min.js') }}"></script>

    <script>
        $('#birth').datetimepicker({
            format: 'MM/DD/YYYY'
        });

        $('#state').select2({
            theme: "bootstrap"
        });

    </script>
@endpush
