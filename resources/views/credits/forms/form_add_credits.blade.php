<form id="exampleValidation" action="{{route('transactions.credit.store')}}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group form-show-validation row py-4">
            <div class="col-md-12">
                <h4 class="text-center">Indique o código identificador <br> do trabalhador</h4>
            </div>
        </div>
        <div class="form-group form-show-validation row d-flex justify-content-center">
            <div class="col-lg-4 col-md-9 col-sm-8">
                <label for="workerID" class="placeholder">Identificador <span
                        class="required-label">*</span></label>
                <input type="text" class="form-control" id="workerID" name="workerID"
                    placeholder="Código do identificador" required>
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
