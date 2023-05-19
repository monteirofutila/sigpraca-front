<form id="exampleValidation" action="" method="POST">
	@csrf
	<div class="card-body">
		<div class="form-group form-show-validation row">
			<label for="identificador" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Identificador <span class="required-label">*</span></label>
			<div class="col-lg-4 col-md-9 col-sm-8">
				<input type="text" class="form-control" id="identificador" name="identificador" placeholder="Código do identificador" required>
			</div>
		</div>
		
	</div>
	<div class="card-action">
		<div class="row">
			<div class="col-md-12">
				<input class="btn btn-success" type="submit" value="Validar o código">
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>										
		</div>
	</div>
</form>