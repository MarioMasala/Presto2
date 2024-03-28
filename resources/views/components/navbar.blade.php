<nav class="navbar navbar-expand-lg bg-nvbar">
    <div class="container-fluid">
        {{-- Pulsante home --}}
        <a class="navbar-brand nav-txt color-mywhite nav-item-onclick" href="{{ route('homepage') }}">
            Presto.it
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                {{-- ESPLORA LE CATEGORIE --}}
                <li class="nav-item dropdown">
                    <button class="btn btn-category-explore nav-item-onclick dropdown-toggle nav-txt color-mywhite" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.explorercategory') }}
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item nav-txt color-mywhite" href="{{route('categoryShow',compact('category'))}}">{{__("ui.$category->name")}}</a></li>
                        @endforeach
                    </ul>
                </li>
                {{-- TUTTI I NOSTRI ANNUNCI --}}
                <li class="nav-item">
                    <a class="nav-link color-mywhite nav-txt nav-item-onclick" href="{{ route('announcements.index') }}">{{ __('ui.allAnnouncements') }}</a>
                </li>
            </ul>
        </div>
    
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                {{-- inizio logica guest --}}
                @guest
                    {{-- REGISTRATI --}}
                    <li class="nav-item">
                        <a class="nav-link nav-txt color-mywhite nav-item-onclick" href="{{ route('register') }}">{{ __('ui.register') }}</a>
                    </li>
                    {{-- ACCEDI --}}
                    <li class="nav-item">
                        <a class="nav-link nav-txt color-mywhite nav-item-onclick" href="{{ route('login') }}">{{ __('ui.login') }}</a>
                    </li>
                    {{-- fine logica guest --}}
                @else
                    {{-- NOME UTENTE LOGGATO --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link color-mywhite nav-txt nav-item-onclick dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                        </a>
                
                        <ul class="dropdown-menu">
                            
                            {{-- CREA ANNUNCIO --}}
                            <li>
                                <a class="nav-link nav-txt color-mywhite nav-item-onclick" href="{{route('announcements.create')}}">{{ __('ui.titlecreate') }}</a>
                            </li>
                            {{--  funzioni revisore  --}}
                            @if(Auth::user()->is_revisor)
                            {{-- ZONA REVISORE --}}
                            <li class="nav-item">
                                <a class="nav-link nav-txt btn-sm position-relative nav-item-onclick" href="{{ route('revisor.index') }}">{{ __('ui.zonerevisor') }} 
                                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-pill bg-count">
                                        {{ App\Models\Announcement::toBeRevisionedCount() }}
                                        <span class="visually-hidden">
                                            unread messages
                                        </span>
                                    </span>
                                </a>
                            </li>
                            @endif
                            {{--  fine funzioni revisore  --}}
                            <li>
                                {{-- logica di logout --}}
                                <a href="{{ route('logout') }}" class="nav-link nav-txt"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                {{-- fine logica logout --}}
                            </li>
                        </ul>

                    </li>
                @endguest
            </ul>
            <form action="{{route('announcements.search')}}" method="GET" class="d-flex">
                <input type="search" name="searched" class="form-control form-control-nav me-2" placeholder={{ __('ui.search') }} aria-label="Search">
                <button class="btn btn-nav-search" type="submit">{{ __('ui.search') }}</button> 
            </form>

            {{-- lingue --}}
            <div class="dropdown">
                <button class="btn btn-flag nav-txt nav-item-onclick dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @php
                    $lang = app()->getLocale();
                    @endphp
                    <img src="{{asset('vendor/blade-flags/language-' . $lang . ".svg")}}" width="20" height="20" alt="Bandiera selezione lingua">
                </button>
                <ul class="dropdown-menu">
                    <li class="nav-item rm-liststyle dropdown-item">
                        <x-_locale lang="it" />
                    </li>
                    <li class="nav-item rm-liststyle dropdown-item">
                        <x-_locale lang="en" />
                    </li>
                    <li class="nav-item rm-liststyle dropdown-item">
                        <x-_locale lang="es" />
                    </li>
                </ul>
            </div>
            {{-- fine lingue --}}
        </div>
    </div>
</nav>
