<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link">
            <!--begin::Brand Image--> <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
                class="brand-text fw-light">AdminLTE 4</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div>
    <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="#" class="nav-link"> <i
                            class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="./index.html" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Dashboard v1</p>
                            </a> </li>

                    </ul>
                </li>

                <li class="nav-header">COMPONENTS</li>
                <li class="nav-item  {{ request()->is('slider') ||request()->is('slider/create') ||request()->is('slider/edit/*') ? 'active menu-open': '' }}">
                    <a href="{{url('slider')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home Page</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('services') ||request()->is('services/create') ||request()->is('services/edit/*') || request()->is('whatwedo') ||request()->is('whatwedo/create') ||request()->is('whatwedo/edit/*') ? 'active menu-open': '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            About Us
                            <i class="nav-arrow fas fa-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('whatwedo') }}" class="nav-link {{ request()->is('whatwedo') ||request()->is('whatwedo/create') ||request()->is('whatwedo/edit/*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>What We Do</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('services') }}" class="nav-link {{ request()->is('services') ||request()->is('services/create') ||request()->is('services/edit/*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Services</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  {{ request()->is('portfolio') ||request()->is('portfolio/create') ||request()->is('portfolio/edit/*') ? 'active menu-open': '' }}">
                    <a href="{{url('portfolio')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Portfolio</p>
                    </a>
                </li>

                
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('fixed-content/create') }}"
                                class="nav-link {{ request()->is('fixed-content/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Content</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('slider/create') }}"
                                class="nav-link {{ request()->is('slider/create') || request()->is('slider/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('video/create') }}"
                                class="nav-link {{ request()->is('video/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Video</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('homepage-version/create') }}"
                                class="nav-link {{ request()->is('homepage-version/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Homepage Versions</p>
                            </a>
                        </li>
                    </ul> --}}
               
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside>
