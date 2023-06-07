<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarPanel">
    <div class="offcanvas-body">
        <!-- profile box -->
        <div class="profileBox">
            <div class="image-wrapper">
                <img src="{{__(auth()->user()['detail']['picture'])}}" alt="image"
                     class="imaged rounded">
            </div>
            <div class="in">
                <strong>{{ __(auth()->user()->name )}}</strong>
                @if(auth()->user()?->role_id != 4)
{{--                    <strong>{{ auth()->user()?->kodeEmp->kode_emp}}</strong>--}}
                @endif
                <div class="text-muted">
                    <ion-icon name="location"></ion-icon>
                    Indonesia, DKI Ja
                </div>
            </div>
            <a href="#" class="close-sidebar-button" data-bs-dismiss="offcanvas">
                <ion-icon name="close"></ion-icon>
            </a>
        </div>
        <!-- * profile box -->
        <ul class="listview flush transparent no-line image-listview mt-2">

            <li>
                <a href="#" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Notifications</div>
                        <span class="badge badge-danger">{{ __(4) }}</span>
                    </div>
                </a>
            </li>

        </ul>
    </div>
    <!-- sidebar buttons -->
    <div class="sidebar-buttons ">
        <form action="{{ route("home.logout") }}" method="post" class="ms-2 button">
            @csrf
            <button type="submit" href="" class="btn btn-amazon btn-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                    <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                </svg>
            </button>
        </form>
        <a href="{{ route('home.me.profile') }}" class="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
            </svg>
        </a>
    </div>
    <!-- * sidebar buttons -->
</div>
