<form id="exampleValidation" action="{{ route('users.update', $data->id) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group form-show-validation row">
            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nome completo <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}"
                    placeholder="Nome completo" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email</label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}"
                    placeholder="Email">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Telefone </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="tel" class="form-control" id="phone_mobile" name="phone_mobile"
                    value="{{ $data->phone_mobile }}" placeholder="Telefone">
                @error('phone_mobile')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="separator-solid"></div>
        <div class="form-group form-show-validation row">
            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Gênero <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8 d-flex align-items-center">
                <div class="custom-control custom-radio">
                    <input type="radio" value="M" id="male" name="gender" class="custom-control-input" checked>
                    <label class="custom-control-label" for="male">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" value="F" id="female" name="gender" class="custom-control-input">
                    <label class="custom-control-label" for="female">Feminino</label>
                </div>
                @error('gender')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="date_birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nascimento </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <div class="input-group">
                    <input type="date" class="form-control" id="date_birth" name="date_birth"
                        value="{{ $data->date_birth }}">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-calendar-check"></i>
                        </span>
                    </div>
                </div>
                @error('date_birth')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Bilhete </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="bi" name="bi" value="{{ $data->bi }}"
                    placeholder="Bilhete de identidade">
                @error('bi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="separator-solid"></div>
        <div class="form-group form-show-validation row">
            <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">País </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="tel" class="form-control" id="address_country" value="{{ $data->address->address_country }}"
                    name="address_country" placeholder="País">
                @error('address_country')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Cidade </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="tel" class="form-control" id="address_city" value="{{ $data->address->address_city }}"
                    name="address_city" placeholder="Cidade">
                @error('address_city')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Bairro </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="tel" class="form-control" id="address_street" value="{{ $data->address->address_street }}"
                    name="address_street" placeholder="Bairro">
                @error('address_street')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="separator-solid"></div>
        <div class="form-group form-show-validation row">
            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Foto </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <div class="input-file input-file-image">
                    <img class="img-upload-preview img-circle" width="100" height="100"
                        src="{{ $data->photo ?? 'http://placehold.it/100x100' }}"
                        alt="preview">
                    <input type="file" class="form-control form-control-file" id="uploadImg" name="photo"
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

@push('js')
    <script src="{{ asset('assets/js/plugin/select2/select2.full.min.js') }}"></script>
    <script>
        $('#role').select2({
            theme: "bootstrap"
        });

    </script>
@endpush
