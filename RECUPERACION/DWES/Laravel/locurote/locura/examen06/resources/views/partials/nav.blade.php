<nav style="background: #eee; padding: 10px;">
    <a href="{{ route('productos.index') }}">Productos</a> |
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Cerrar sesión
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>
</nav>
