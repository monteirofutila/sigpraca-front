@extends('layouts.template_login')
@section('titulo', 'Login')
@section('content')
<div class="container container-login animated fadeIn">
    <h3 class="text-center">{{$marketName}}</h3>
    <div class="login-form">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="user_name" class="placeholder"><b>Nome de usuário</b></label>
                <input id="user_name" name="user_name" type="text" value="{{old('user_name')}}" class="form-control" required>
                @error('user_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="placeholder"><b>Password</b></label>
                <div class="position-relative">
                    <input id="password" name="password" type="password" value="{{old('password')}}" class="form-control" required>
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group form-action-d-flex mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberme">
                    <label class="custom-control-label m-0" for="rememberme">Lembrar me</label>
                </div>
                <button type="submit" class="btn btn-warning col-md-5 float-right mt-3 mt-sm-0 fw-bold">Entrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
