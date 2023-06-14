<form id="exampleValidation" action="{{route('transactions.credit.store')}}" method="POST">
	@csrf
	<div class="card-body">
		<input type="hidden" value="{{$data->worker_id}}" name="worker_id">
		<input type="hidden" value="{{$data->password}}" name="password">
		<input type="hidden" value="{{$data->value_credit}}" name="amount">
		<div class="form-group form-show-validation row d-flex justify-content-center">
			<div class="col-lg-4 col-md-9 col-sm-8">
				<label for="value" class="placeholder">Montante</label>
				<input type="text" class="form-control" id="value" value="{{ number_format($data->value_credit, 2, ',', '.') }}" name="value" disabled>
			</div>
		</div>
		<div class="form-group form-show-validation row d-flex justify-content-center">
			<div class="col-lg-4 col-md-9 col-sm-8">
				<label for="worker_id" class="placeholder">Identificador</label>
				<input type="text" class="form-control" id="worker_id" value="{{$data->worker_id}}" name="worker_id" disabled>
			</div>
		</div>
		<div class="form-group form-show-validation row d-flex justify-content-center">
			<div class="col-lg-4 col-md-9 col-sm-8">
				<label for="name" class="placeholder">Feirante</label>
				<input type="text" class="form-control" id="name" value="{{$data->name}}" name="name" disabled>
			</div>
		</div>
		<div class="form-group form-show-validation row d-flex justify-content-center">
			<div class="col-lg-4 col-md-9 col-sm-8">
				<label for="category" class="placeholder">Categoria</label>
				<input type="text" class="form-control" id="category" value="{{$data->category}}" name="category" disabled>
			</div>
		</div>
		<div class="form-group form-show-validation row d-flex justify-content-center">
			<div class="col-lg-4 col-md-9 col-sm-8">
				<label for="balance" class="placeholder">Saldo dispónivel</label>
				<input type="text" class="form-control" id="balance" value="{{ number_format($data->balance, 2, ',', '.') }}" name="balance" disabled>
			</div>
		</div>
	</div>
	<div class="card-action">
		<div class="row">
			<div class="col-md-12">
				<input class="btn btn-success" type="submit" value="Confirmar">
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>
		</div>
	</div>
</form>