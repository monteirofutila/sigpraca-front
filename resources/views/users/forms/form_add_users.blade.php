<form id="exampleValidation" action="{{ route('users.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group form-show-validation row">
            <label for="user_name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nome de usuário <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="user_name" name="user_name"
                    value="{{old('user_name')}}" placeholder="Nome de usuário" required>
                @error('user_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nome completo <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="name" name="name"
                    value="{{old('name')}}" placeholder="Nome completo" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"
                    placeholder="Email" >
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="password" class="form-control" id="password" name="password"
                    value="{{old('password')}}" placeholder="Password" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="confirmpassword" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Confirmar Password <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="password" class="form-control" id="confirmpassword" name="password_confirmation"
                    value="{{old('password_confirmation')}}" placeholder="Confirmar Password"
                    required>
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="separator-solid"></div>
        <div class="form-group form-show-validation row">
            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Gênero </label>
            <div class="col-lg-4 col-md-9 col-sm-8 d-flex align-items-center">
                <div class="custom-control custom-radio">
                    <input type="radio" value="M" id="male" name="gender" class="custom-control-input" checked>
                    <label class="custom-control-label" for="male">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" value="F" id="female" name="gender" class="custom-control-input">
                    <label class="custom-control-label" for="female">Feminino</label>
                </div>
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nascimento </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <div class="input-group">
                    <input type="date" class="form-control" id="birth" name="date_birth"
                        value="{{old('date_birth')}}">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-calendar-check"></i>
                        </span>
                    </div>
                    @error('date_birth')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Bilhete </label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="bi" name="bi" value="{{old('bi')}}"
                    placeholder="Bilhete de identidade">
                @error('bi')
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
                        src="http://placehold.it/100x100" alt="preview">
                    <input type="file" class="form-control form-control-file" id="uploadImg"
                        value="{{old('photo')}}" name="photo" accept="image/*">
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
