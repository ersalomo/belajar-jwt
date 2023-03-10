{{--@props(['name'])--}}
<div class="header">
    <div class="header-left">
        <a href="" class="logo">
            <img src="/assets/img/logo-icon.png" width="40" height="40" alt="">
            <span>Crypto</span>
        </a>
    </div>
    <div class="left-right-menu">
        <a id="toggle_btn" class="left-chev" href="javascript:void(0);"><i class="fas fa-chevron-left"></i></a>
    </div>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars"></i></a>
    <div class="header-nav-blk">
        <h4>Dashboard</h4>
        <span>My Activity</span>
    </div>
    <ul class="nav user-menu user-menu-group float-end">
        <li class="top-liv-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><img src="/assets/img/icon/search-icon.svg"
                        alt=""></button>
            </form>
        </li>

        <li class="nav-item dropdown has-arrow user-profile-list">
            <a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="/assets/img/profile/user-03.jpg" width="40"
                        alt="Admin">
                    <span class="status online"></span>
                </span>
                <div class="user-names">
{{--                    <h5>{{ auth('api')->user()->name }}</h5>--}}
                    <span>Administrator</span>
                </div>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="{{ route('home.profile', ['token' => request()->token]) }}">Edit Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>
                <form action="{{ route('api.logout') }}" method="POST">
                    <button type="submit" class="dropdown-item">
                        <img src="/assets/img/icon/lock-out.svg" class="me-2" alt=""> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-end">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                class="fas fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="">My Profile</a>
            <a class="dropdown-item" href="">Edit Profile</a>
            <a class="dropdown-item" href="">Settings</a>
            <form action="{{ route('api.logout') }}" method="POST">
                <button type="submit" class="dropdown-item">
                    <img src="/assets/img/icon/lock-out.svg" class="me-2" alt=""> Logout
                </button>
            </form>
        </div>
    </div>
</div>
