<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center">
            <!-- Logo -->
            <div>
                <span class="smini-visible fw-bold tracking-wide fs-lg">
                    AWT
                </span>

                <a class="link-fx fw-bold tracking-wide mx-auto" href="/">
                    <span class="smini-hidden">
                        {{-- <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span> --}}
                        <img src="{{ asset('images/logo.png') }}" alt="AWT" style="height:50px">
                    </span>
                </a>
            </div>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side User -->
            <div class="content-side content-side-user px-0 py-0">
                <!-- Visible only in mini mode -->
                <div class="smini-visible-block animated fadeIn px-3">
                    <img class="img-avatar img-avatar32" src="{{ asset('images/avatar15.jpg') }}" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="smini-hidden text-center mx-auto">
                    <a class="img-link" href="void:;">
                        <img class="img-avatar" src="{{ asset('images/avatar15.jpg') }}" alt="">
                    </a>
                    <ul class="list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a class="link-fx text-dual fs-sm fw-semibold text-uppercase"
                                href="void:;">{{ auth()->check() ? auth()->user()->username : 'Guest' }}</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-fx text-dual" data-toggle="layout" data-action="dark_mode_toggle"
                                href="void:;">
                                <i class="fa fa-moon"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" id="logoutBtn" style="display: none;"></button>
                            </form>

                            <a class="link-fx text-dual" style="cursor: pointer;"
                                onclick="document.getElementById('logoutBtn').click()">
                                <i class="fa fa-sign-out-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    @include('backend.layouts.menu.content-sidebar')
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->
