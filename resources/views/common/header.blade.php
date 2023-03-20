<section>
            <header>
                <a name="top-header">&nbsp;</a>
                <nav class="navbar navbar-default fixed-top">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{url('admin/dashboard/newprojects')}}"><img src="{{asset('images/logo.png')}}" class="img-fluid" alt="Logo" width="100"></a>
                        <ul class="nav justify-content-end humger-left-menu">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-globe fs-5"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Review Program</a></li>
                                    <hr>
                                    <li><a class="dropdown-item" href="#">Translation Program</a></li>
                                    <hr>
                                    <li><a class="dropdown-item" href="#">Amazon Program</a></li>
                                    <hr>
                                    <li><a class="dropdown-item" href="#">Developer/Vendor Program</a></li>
                                    <hr>
                                    <li><a class="dropdown-item" href="#">Youtube Program</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <h5 class="text-light fs-5">Welcome: {{ Auth::user()->name}}</h5>
                            </li>
                        </ul>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <i class="bi bi-list text-light fs-2"></i>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Lumos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                     <li class="nav-item">
                                        <a class="nav-link" href="{{url('admin/dashboard/newprojects')}}">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('admin/dashboard/users')}}">Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('logout')}}">Logout</a>
                                    </li>    
                                    <!--<li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another</a></li>
                                            <li><a class="dropdown-item" href="#">Something</a></li>
                                        </ul>
                                    </li>-->
                                </ul>
                            </div>
                        </div>
                        <ul class="nav justify-content-end humger-right-menu">
                            <li class="nav-item">
                                <a href="https://docs.google.com/spreadsheets/d/1bL9UHkeRIGEd4rYodAixRQ9II6jcZBf8aTNDSDG2xIM/edit#gid=0" target="_blank" class="nav-link text-light fs-5">Font</a>
                            </li>
                            <li class="nav-item">
                                <a href="#bottom" class="nav-link text-light fs-4" title="Go to Bottom"><i class="bi bi-arrow-down-circle fs-4"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        </section>