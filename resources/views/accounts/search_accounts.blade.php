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
            <div class="col-md-12">
                <form action="{{ route('accounts.search') }}" method="post">
                    @csrf
                    <div class="input-group col-6 pl-0 mb-3">
                        <input type="text" class="form-control col-md-5" id="workerID" name="workerID"
                            placeholder="Identificador do feirante">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
