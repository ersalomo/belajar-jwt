<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
       id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav">
        </i>
        <a class="navbar-brand m-0" href=""
           target="_blank">
            <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQH4pt4g6-0GZq1p4X_vwG7UKNWJR5XpY-Ozy0Am4uTXQ&s"
                class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Dashboard Admin</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{request()->is('admin/dashboard') ? 'active' : ''}}"
                   href="{{ route('admin.dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Menu</h6>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesTable" class="nav-link collapsed"
                   aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
                <div class="collapse" id="pagesTable" style="">
                    <ul class="nav ms-4">
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('admin/user/index') ? 'active' : ''}}"
                               href="{{route('admin.user.index')}}#">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('admin/list-appointments') ? 'active' : ''}}"
                               href="{{route('admin.list-appointments')}}#">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Appointments</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('admin/roles-list') ? 'active' : ''}}"
                               href="{{route('admin.roles-list')}}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Roles</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('admin/departments') ? 'active' : ''}}"
                               href="{{route('admin.department.index')}}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Department</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link collapsed"
                   aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Visitation</span>
                </a>
                <div class="collapse" id="pagesExamples" style="">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link" aria-expanded="false" href="{{ route('admin.visit.index') }}">
                                <span class="sidenav-normal"> Visitation Visitor <b class="caret"></b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#usersExample">
                                <span class="sidenav-mini-icon"> U </span>
                                <span class="sidenav-normal"> visitation status <b class="caret"></b></span>
                            </a>
                            <div class="collapse" id="usersExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="">
                                            <span class="sidenav-mini-icon text-xs"> C </span>
                                            <span class="sidenav-normal">Checkin</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="">
                                            <span class="sidenav-mini-icon text-xs"> N </span>
                                            <span class="sidenav-normal"> Checkout </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <form action="{{route('admin.logout')}}" class="nav-link" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="ms-4 justify-content-center btn btn-github btn-block">Sign out</button>
                </form>

            </li>
        </ul>
    </div>
</aside>
