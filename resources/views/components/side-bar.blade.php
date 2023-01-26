<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a class="active" href="{{ route('login.home') }}"><img src="assets/img/icon/menu-icon-01.svg"
                            alt="img">
                        <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><img src="assets/img/icon/menu-icon-13.svg" alt="img"> <span>
                            Transactions
                        </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href=""><i class="feather-more-horizontal"></i><span> View
                                    Transactions</span></a></li>
                        <li><a href=""><i class="feather-more-horizontal"></i><span>
                                    Transaction Search</span></a></li>
                        <li><a href=""><i class="feather-more-horizontal"></i>
                                <span>Single Transaction</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="assets/img/icon/menu-icon-07.svg" alt="img"> <span>
                            Employees </span>
                        <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('home.accounts') }}">Employees List</a></li>
                        <li><a href="">Leaves</a></li>
                        <li><a href="">Holidays</a></li>
                        <li><a href="">Attendance</a></li>
                    </ul>
                </li>

                <li>
                    <a href=""><img src="assets/img/icon/menu-icon-10.svg" alt="img">
                        <span>Activities</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><img src="assets/img/icon/menu-icon-11.svg" alt="img"> <span>
                            Reports </span>
                        <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href=""> Expense Report </a></li>
                        <li><a href=""> Invoice Report </a></li>
                    </ul>
                </li>
                <li>
                    <a href=""><img src="assets/img/icon/menu-icon-12.svg" alt="img">
                        <span>Settings</span></a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fas fa-share-alt"></i> <span>Multi Level</span>
                        <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><span>Level 1</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="logout-btn">
                <a href="" class="btn btn-primary"><img src="assets/img/icon/lock-out.svg" class="me-2"
                        alt="">Logout</a>
            </div>
        </div>
    </div>
</div>
