@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('storage/' . $appLogo) }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white fs-5">{{ $appName }}</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Main Menu</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-chart-line ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'display.index' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('display.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-desktop ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Display</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'evaluate.index' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('evaluate.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-chart-pie ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Evaluate</span>
                </a>
            </li>
            <li class="nav-item mt-4">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('user-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('logout') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons ps-2 opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
            <li class="nav-item mt-4">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Requests</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'transaction.standby' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('transaction.standby') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-bullhorn ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Standby</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'transaction.status.call' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('transaction.status.call') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-phone ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Call</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'transaction.status.response' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('transaction.status.response') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-flag ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Response</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'transaction.status.pending' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('transaction.status.pending') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-pause ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pending</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'transaction.index' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('transaction.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-retweet ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">All Requests</span>
                </a>
            </li>
            @if (auth()->user()->role->id == 1)
                <li class="nav-item mt-4">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Essential Data
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'user-management' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('user-management') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'device.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('device.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fa fa-lg fa-microchip ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Device</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'button.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('button.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fa fa-toggle-off ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Button Config</span>
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Master Data
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'roles.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('roles.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fas fa-lg fa-user-shield ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Role</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'department.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('department.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fas fa-lg fa-building ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Department</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'section.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('section.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fas fa-lg fa-user-tie ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Section</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'jabatan.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('jabatan.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fas fa-lg fa-user-plus ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Jabatan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'company.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('company.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fa fa-lg fa-building ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Company</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'building.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('building.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fa fa-lg fa-building ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Building</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'zona.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('zona.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fa fa-lg fa-street-view ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Zona</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'line.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('line.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;"
                                class="fa fa-lg fa-grip-lines-vertical ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Line</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'process.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('process.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fa fa-lg fa-rotate-left ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Process</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'equipment.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('equipment.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fa fa-lg fa-toolbox ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Equipment</span>
                    </a>
                </li>

                <li class="nav-item mt-4">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Settings</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'settings.index' ? 'active bg-gradient-primary' : '' }} "
                        href="{{ route('settings.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1.2rem;" class="fas fa-cogs ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Settings App</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
