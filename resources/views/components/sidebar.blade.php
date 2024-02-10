<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>Administração</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.condominio.index') }}" class="nav-link {{ Route::is('admin.condominio.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>Condomínio</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orcamento.index') }}" class="nav-link {{ Route::is('admin.orcamento.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>Orçamentos</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.financeiro.index') }}" class="nav-link {{ Route::is('admin.financeiro.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-piggy-bank"></i>
                <p>Financeiro/Caixa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.documentos.index') }}" class="nav-link {{ Route::is('admin.documentos.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-pdf"></i>
                <p>Documentos</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.profile.edit') }}" class="nav-link {{ Route::is('admin.profile.edit') ? 'active' : '' }}">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Perfil</p>
            </a>
        </li>
    </ul>
</nav>
