<li class="nav-item @if ($activePage == 'home') active @endif">
    <a href="{{ route('home') }}">
        <i class="fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-section">
    <span class="sidebar-mini-icon">
        <i class="fa fa-ellipsis-h"></i>
    </span>
    <h4 class="text-section">Finanças</h4>
</li>
<li class="nav-item @if ($activePage == 'accounts') active @endif">
    <a href="{{ route('accounts.index') }}">
        <i class="fas fa-wallet"></i>
        <p>Contas</p>
    </a>
</li>
<li class="nav-item @if ($activePage == 'transactions') active @endif">
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
<li class="nav-item @if ($activePage == 'workers') active @endif">
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
