<li class="nav-item active">
    <a href="{{ route('home') }}">
        <i class="fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<!-- <li class="nav-section">
    <span class="sidebar-mini-icon">
        <i class="fa fa-ellipsis-h"></i>
    </span>
    <h4 class="text-section">Estatisticas</h4>
</li>
<li class="nav-item">
    <a href="starter-template.html">
        <i class="far fa-file-excel"></i>
        <p>Fluxo de caixa</p>
    </a>
</li>
<li class="nav-section">
    <span class="sidebar-mini-icon">
        <i class="fa fa-ellipsis-h"></i>
    </span>
    <h4 class="text-section">Relatórios</h4>
</li>
<li class="nav-item">
    <a href="starter-template.html">
        <i class="far fa-file-excel"></i>
        <p>Extratos</p>
    </a>
</li> -->
<li class="nav-section">
    <span class="sidebar-mini-icon">
        <i class="fa fa-ellipsis-h"></i>
    </span>
    <h4 class="text-section">Finanças</h4>
</li>
<!-- <li class="nav-item">
    <a href="starter-template.html">
        <i class="fas fa-wallet"></i>
        <p>Contas</p>
    </a>
</li> -->
<li class="nav-item">
    <a href="{{ route('transactions.index') }}">
        <i class="fas fa-money-bill-alt"></i>
        <p>Transações</p>
    </a>
</li>
<li class="nav-section">
    <span class="sidebar-mini-icon">
        <i class="fa fa-ellipsis-h"></i>
    </span>
    <h4 class="text-section">Administração</h4>
</li>
<li class="nav-item">
    <a data-toggle="collapse" href="#categories">
        <i class="fas fa-user-tie"></i>
        <p>Categorias</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="categories">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{ route('categories.create') }}">
                    <span class="sub-item">Cadastrar categorias</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}">
                    <span class="sub-item">Lista de categorias</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a data-toggle="collapse" href="#workers">
        <i class="fas fa-user-tie"></i>
        <p>Feirantes</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="workers">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{ route('workers.create') }}">
                    <span class="sub-item">Cadastrar feirante</span>
                </a>
            </li>
            <li>
                <a href="{{ route('workers.index') }}">
                    <span class="sub-item">Lista de feirantes</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a href="{{ route('markets.edit') }}">
        <i class="fas fa-cogs"></i>
        <p>Mercado</p>
    </a>
</li>
<li class="nav-item">
    <a data-toggle="collapse" href="#users">
        <i class="fas fa-user-friends"></i>
        <p>Usuários</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="users">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{ route('users.create') }}">
                    <span class="sub-item">Cadastrar usuário</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">
                    <span class="sub-item">Lista de usuários</span>
                </a>
            </li>
        </ul>
    </div>
</li>
