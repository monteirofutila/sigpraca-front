<form id="exampleValidation" action="{{ route('markets.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group form-show-validation row">
            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nome do mercado <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" placeholder="Nome do mercado" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Descrição</label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="description" name="description" value="{{$data->description}}" placeholder="Descrição">
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Endereço</label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="address" name="address" value="{{$data->description}}" placeholder="Endereço">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Foto </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <div class="input-file input-file-image">
                    <img class="img-upload-preview img-circle" width="100" height="100"
                        src=" {{$data->photo ?? 'http://placehold.it/100x100'}}" alt="preview">
                    <input type="file" class="form-control form-control-file" id="uploadImg" name="photo" value="{{old('photo')}}"
                        accept="image/*">
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="uploadImg" class="btn btn-warning btn-round btn-lg"><i class="fa fa-file-image"></i>
                        Carregar foto</label>
                </div>
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
