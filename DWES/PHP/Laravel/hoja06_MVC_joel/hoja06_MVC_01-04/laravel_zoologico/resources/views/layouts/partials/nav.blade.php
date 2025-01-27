<nav class="bg-green-800 py-6 relative ">
    <div class="container mx-auto flex px-8 xl:px-0">
        <div class="flex flex-grow">
            <img src="{{asset('assets/imagenes/logo.png')}}" alt="logo animal">
        </div>
        <div class="flew lg:hidden">
            <img src="{{asset('assets/imagenes/iconoMenu.png')}}" alt="menu" onClick="openMenu();">
        </div>
        <div id="menu" class="hidden flex-grow  w-full justify-between items-center absolute top-40 left-0 bg-green-800 py-14 px-8 lg:flex lg:relative lg:top-0  lg:py-0 lg:px-0 sm:px-14">
            <div class="flex flex-col mb-8 lg:flex-row lg:mb-0 mx-auto">
                <a href="{{route('inicio')}}" class="text-white mb-1 lg:ml-16 lg:mr-16 lg:mb-8">Inicio</a>
                <a href="{{route('animales.index')}}" class="text-white mb-1 lg:mr-16 lg:mb-8">Listado de Animales</a>
                <a href="{{route('animales.create')}}" class="text-white">Nuevo Animal</a>
            </div>
            <div class="flex flex-col text-center lg:flex-row">
                @auth
                    <p class="bblanco mb-1 lg:mr-4 lg:mb-0">{{ Auth::user()->name }} &nbsp&nbsp</p>
                    <a href="{{ route('logout') }}" class="bverde" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bblanco mb-1 lg:mr-4 lg:mb-0">Iniciar Sesion</a>
                    <a href="{{ route('register') }}" class="bverde">Regístrate</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<script>
    function openMenu(){
        let menu=document.getElementById('menu');
        if (menu.classList.contains('hidden')){
            menu.classList.remove('hidden');
        } else{
            menu.classList.add('hidden');
        }
    }
</script>
