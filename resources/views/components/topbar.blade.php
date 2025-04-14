<div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">
            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu waves-effect waves-light rounded-circle">
               
            </button>
            

            <a href="{{ route('dashboard') }}" class="btn btn-primary waves-effect waves-light ms-2">
                <i class="mdi mdi-office-building me-1"></i> Tableau de Bord
            </a>
          @if (Auth::user()->role == 'Super administrateur')
            <a href="{{ route('configuration.userList') }}" class="btn btn-primary waves-effect waves-light ms-2">
                <i class="mdi mdi-account me-1"></i> Gestion Utilisateurs
            </a>   
          @endif
            <!-- Nouveau bouton Gestion Entité -->
            <a href="{{ route('configuration.index') }}" class="btn btn-primary waves-effect waves-light ms-2">
                <i class="mdi mdi-office-building me-1"></i> Gestion Entités
            </a>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-2">

            <li class="d-none d-md-inline-block">
                <a class="nav-link waves-effect waves-light" href="#" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen font-size-24"></i>
                </a>
            </li>

            <li class="nav-link waves-effect waves-light" id="theme-mode">
                <i class="bx bx-moon font-size-24"></i>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('assets/images/avatar.png') }}" alt="user-image" class="rounded-circle">
                    <span class="ms-1 d-none d-md-inline-block">
                        {{Auth::user()->role}} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <div class="mt-2">
                            <h6 class="dropdown-header">{{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}</h6> 
                        </div>
                  
                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <form method="POST" action="{{ route('auth.logout') }}" class="dropdown-item notify-item">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 text-decoration-none">
                            <i data-lucide="log-out" class="font-size-16 me-2"></i>
                            <span>Se deconnecter</span>
                        </button>
                    </form>

                </div>
            </li>
        </ul>
    </div>
</div>