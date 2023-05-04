<form id="exampleValidation" action="" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group form-show-validation row">
            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nome de usuário <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nome de usuário"
                    required>
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nome completo <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Primeiro nome"
                    required>
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="email" class="form-control" id="email" placeholder="Email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="confirmpassword" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Confirmar Password <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                    placeholder="Confirmar Password" required>
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
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nascimento <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <div class="input-group">
                    <input type="date" class="form-control" id="birth" name="date_birth" required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-calendar-check"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group form-show-validation row">
            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Bilhete <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <input type="text" class="form-control" id="bi" name="bi" placeholder="Bilhete de identidade" required>
            </div>
        </div>
        <div class="separator-solid"></div>
        <div class="form-group form-show-validation row">
            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Foto <span
                    class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
                <div class="input-file input-file-image">
                    <img class="img-upload-preview img-circle" width="100" height="100"
                        src="http://placehold.it/100x100" alt="preview">
                    <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg"
                        accept="image/*" required>
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
