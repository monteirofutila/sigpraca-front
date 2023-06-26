@extends('layouts.template', [
      'activePage' => 'transactions',
])

@section('titulo', 'Creditar saldo')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Créditos</h4>
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
                    <a href="{{ route('transactions.index') }}">Transações</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transactions.credit') }}">Créditos</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Adicionar crédito</div>
                    </div>
                    @include('credits.forms.form_add_credits')
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
    <!-- jQuery Validation -->
    <script src="{{ asset('assets/js/plugin/jquery.validate/jquery.validate.min.js') }}">
    </script>

    <script>
        $('#birth').datetimepicker({
            format: 'MM/DD/YYYY'
        });

        $('#state').select2({
            theme: "bootstrap"
        });

        /* validate */

        // validation when select change
        $("#state").change(function () {
            $(this).valid();
        })

        // validation when inputfile change
        $("#uploadImg").on("change", function () {
            $(this).parent('form').validate();
        })

        $("#exampleValidation").validate({
            validClass: "success",
            rules: {
                gender: {
                    required: true
                },
                confirmpassword: {
                    equalTo: "#password"
                },
                birth: {
                    date: true
                },
                uploadImg: {
                    required: true,
                },
            },
            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function (element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            },
        });

    </script>
@endpush
