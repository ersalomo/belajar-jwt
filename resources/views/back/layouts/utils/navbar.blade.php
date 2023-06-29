<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        @yield('breadcrumb')
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
{{--                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>--}}
{{--                    <input type="text" class="form-control" placeholder="Type here...">--}}
                </div>
            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:void();" class="nav-link text-white font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Hallo,  {{__(auth()->user()->name)}}</span>
                    </a>
                </li>
                <li class="nav-item dropdown ms-2 pe-2 d-flex align-items-center">
                    <a href="javascript:void();" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        @foreach(\App\Models\Notification::getNotifyForAdmin() as $nf)
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="/">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{auth()->user()->detail['picture']}}" class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1" style="">
                                                <span class="font-weight-bold  text-dark">{{$nf['title']}}</span>
                                            </h6>
                                            <p class="text-xs text-dark mb-0">
                                                <i class="me-1" aria-hidden="true"></i>
                                                {{$nf['body']}}
                                            </p>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1" aria-hidden="true"></i>
                                                {{$nf['created_at']}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript::void();" class="nav-link text-white p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
