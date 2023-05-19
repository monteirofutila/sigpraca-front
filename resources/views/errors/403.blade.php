
@extends('layouts.template_errors')
@section('titulo', 'Acesso Proíbido')
@section('content')
<h1 class="animated fadeIn">403</h1>
<div class="desc animated fadeIn"><span>OPA!</span><br />Acesso Proíbido - Não tem permissão para acesseder a está página</div>
<a href="{{route('home')}}" class="btn btn-primary btn-back-home mt-4 animated fadeInUp">
    <span class="btn-label mr-2">
        <i class="flaticon-home"></i>
    </span>
    Voltar para início
</a>
@endsection
