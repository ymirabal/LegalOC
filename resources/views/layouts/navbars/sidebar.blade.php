<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Bienvenido!') }}</h6>
                    </div>
                    {{-- <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Mi perfil') }}</span>
                    </a> --}}
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a> --}}
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Actividad') }}</span>
                    </a> --}}
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Cerrar sesión') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            @canany(['home','workers','nomenclators','users','roles'])                
           
                <h6 class="navbar-heading text-muted">Administración</h6>
                <ul class="navbar-nav">

                    @can('home')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="ni ni-tv-2 text-danger"></i> {{ __('Administración') }}
                            </a>
                        </li>
                    @endcan

                    @can('workers')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.workers.index') }}">
                                <i class="fas fa-user-tie text-blue"></i> {{ __('Trabajadores') }}
                            </a>
                        </li>
                    @endcan

                    @can('nomenclators')
                        <li class="nav-item">                    
                            <a class="nav-link collapsed" href="#navbar-nomencladores" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-nomencladores">
                                <i class="ni ni-book-bookmark text-green" ></i>
                                <span class="nav-link-text" >{{ __('Nomencladores') }}</span>
                            </a>

                            <div class="collapse" id="navbar-nomencladores">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.actions.index') }}">
                                            {{ __('Medidas Disciplinarias') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.facts.index') }}">
                                            {{ __('Hechos') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.concepts.index') }}">
                                            {{ __('Conceptos') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.entities.index') }}">
                                            {{ __('Unidades') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.areas.index') }}">
                                            {{ __('Areas') }}
                                        </a>
                                    </li>                                                      
                                </ul>
                            </div>
                        </li>
                    @endcan  

                    @can('users')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <i class="fas fa-users text-dark"></i> {{ __('Usuarios') }}
                            </a>
                        </li>
                    @endcan

                    @can('roles')
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="fas fa-users-cog text-orange"></i> {{ __('Roles') }}
                        </a>
                    </li>
                    @endcan

               
                </ul>
                <!-- Divider -->
                <hr class="my-3">
             @endcanany
            
            @can('legal actions')
                
                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Acciones legales</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('law.disciplinaryActions.index')}}">
                            <i class="fas fa-balance-scale text-blue"></i> Medidas Disciplinarias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('law.responsibilities.index')}}">
                            <i class="fas fa-coins text-blue"></i> Responsabilidad Material
                        </a>
                    </li>
                    
                    <li class="nav-item">                    
                        <a class="nav-link" href="#navbar-claims" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-claims">
                            <i class="fas fa-money-check text-blue" ></i>
                            <span class="nav-link-text" >{{ __('Reclamaciones') }}</span>
                        </a>

                        <div class="collapse" id="navbar-claims">
                            <ul class="nav nav-sm flex-column">
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('law.claims.index')}}">
                                        {{ __('Ordinarias') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('law.countClaims.index')}}">
                                        {{ __('Cuentas por Cobrar') }}
                                    </a>
                                </li>                                                     
                            </ul>
                        </div>
                    </li>
                </ul>
                <hr class="my-3">
            @endcan
            
            
            @can('reports')  

                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Reportes</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    
                    <li class="nav-item">                    
                        <a class="nav-link" href="#navbar-responsibility" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-responsibility">
                            <i class="fas fa-coins text-dark" ></i>
                            <span class="nav-link-text" >{{ __('Medidas disciplinarias') }}</span>
                        </a>

                        <div class="collapse" id="navbar-responsibility">
                            <ul class="nav nav-sm flex-column">
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('disciplinaryActions.cuadro') }}">
                                        {{ __('Cuadros') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('disciplinaryActions.funcionario') }}">
                                        {{ __('Funcionarios') }}
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('disciplinaryActions.trabajador') }}">
                                        {{ __('Trabajadores') }}
                                    </a>
                                </li>                                                    
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('responsibilities.report')}}">
                            <i class="fas fa-balance-scale text-dark"></i> Responsabilidad Material                       
                        </a>
                    </li>
                
                    <li class="nav-item">                    
                        <a class="nav-link" href="#navbar-reports" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-reports">
                            <i class="fas fa-money-check text-dark" ></i>
                            <span class="nav-link-text" >{{ __('Reclamaciones') }}</span>
                        </a>

                        <div class="collapse" id="navbar-reports">
                            <ul class="nav nav-sm flex-column">
                            
                                <a class="nav-link" href="#navbar-ordinarias" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-reports">
                                    
                                    <span class="nav-link-text" >{{ __('Ordinarias') }}</span>
                                </a>
                                <div class="collapse" id="navbar-ordinarias">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('doneClaims.report') }}">
                                                {{ __('Efectuadas') }}
                                            </a>
                                        </li> 
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('receivedClaims.report') }}">
                                                {{ __('Recibidas') }}
                                            </a>
                                        </li> 

                                    </ul>
                                </div>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('countClaims.report') }}">
                                        {{ __('Cuentas por Cobrar') }}
                                    </a>
                                </li>                                                     
                            </ul>
                        </div>
                    </li>
                </ul>

            @endcan
        </div>
    </div>
</nav>


