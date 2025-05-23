<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{Auth::user()->rol === 'admin' ? route('admin.index') : route('esdeveniments.index')}}" style="color:#777"><span style="font-size:15pt">
            <img src="{{asset('img/logo.png')}}" alt="" style="max-width: 50px; margin-right: 10px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        @if(Auth::user()->rol === 'admin')
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{route('admin.create')}}" class="nav-link">
                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                    Añadir evento
                </a>
            </li>
        </ul>  
        
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{route('admin.createCategoria')}}" class="nav-link">
                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                    Añadir categoria
                </a>
            </li>
        </ul>  
        @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            Perfil
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
