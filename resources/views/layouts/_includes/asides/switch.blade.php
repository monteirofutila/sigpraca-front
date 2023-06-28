
@if (in_array('Administrador', session('user')->roles))
    @include('layouts._includes.asides.includes.aside_admin')
@endif 

@if (in_array('Caixa', session('user')->roles))
    @include('layouts._includes.asides.includes.aside_caixa')
@endif
