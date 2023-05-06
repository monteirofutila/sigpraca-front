
@extends('layouts.template_errors')
@section('titulo', 'Página não encontrada')
@section('content')
<h1 class="animated fadeIn">404</h1>
<div class="desc animated fadeIn"><span>OPA!</span><br />Página não encontrada</div>
<a href="{{route('home')}}" class="btn btn-primary btn-back-home mt-4 animated fadeInUp">
    <span class="btn-label mr-2">
        <i class="flaticon-home"></i>
    </span>
    Voltar para início
</a>
@endsection
