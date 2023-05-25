<form id="exampleValidation" action="{{route('transactions.credit.confirmation')}}" method="GET">
    @csrf
    <div class="card-body">
        <div class="form-group form-show-validation row py-4">
            <div class="col-md-12">
                <h4 class="text-center">Indique o código identificador <br> do trabalhador</h4>
            </div>
        </div>
        <div class="form-group form-show-validation row d-flex justify-content-center">
            <div class="col-lg-4 col-md-9 col-sm-8">
                <label for="worker_id" class="placeholder">Identificador <span class="required-label">*</span></label>
                <input type="text" class="form-control" id="worker_id" name="worker_id" value="{{old('worker_id')}}" placeholder="Código do identificador" required>
                @error('worker_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
        </div>
        <div class="form-group form-show-validation row d-flex justify-content-center">
            <div class="col-lg-4 col-md-9 col-sm-8">
                <label for="password" class="placeholder">Confirmar password <span class="required-label">*</span></label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Confirmar password" required>
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
        </div>

    </div>
    <div class="card-action">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <input class="btn btn-success" type="submit" value="Validar o código">
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </div>
</form>