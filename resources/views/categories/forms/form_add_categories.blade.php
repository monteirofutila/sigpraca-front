<form id="exampleValidation" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group form-show-validation row">
            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nome <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Nome da categoria" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Descrição</label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}" placeholder="Descrição">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="payment_period" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Périodo de pagamento <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <div class="select2-input">
                    <select id="payment_period" name="payment_period" class="form-control" required>
                        <option value=""></option>
                        <option value="day">Diário</option>
                        <option value="week">Semanal</option>
                        <option value="month">Mensal</option>
                        <option value="quarter">Trimestral</option>
                        <option value="year">Anual</option>
                    </select>
                    @error('payment_period')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="debit_amount" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Montante do Débito <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="number" class="form-control" id="debit_amount" name="debit_amount" value="{{old('debit_amount')}}" placeholder="Montante do débito"
                    required>
                @error('debit_amount')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
        </div>

    </div>
    <div class="card-action">
        <div class="row">
            <div class="col-md-12">
                <input class="btn btn-success" type="submit" value="Guardar">
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </div>
</form>

@push('js')
    <script src="{{ asset('assets/js/plugin/select2/select2.full.min.js') }}"></script>
    <script>
        $('#payment_period').select2({
            theme: "bootstrap"
        });

    </script>
@endpush
