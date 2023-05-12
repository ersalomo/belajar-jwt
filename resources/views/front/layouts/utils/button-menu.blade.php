<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="{{ route('home.home-user') }}" class="item">
        <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
            </svg>
        </div>
    </a>
    @if(auth()->user()?->role_id == 4)
        <a href="{{ route('home.appointment.create') }}" class="item">
            <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ballpen" width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 6l7 7l-4 4"></path>
                    <path
                        d="M5.828 18.172a2.828 2.828 0 0 0 4 0l10.586 -10.586a2 2 0 0 0 0 -2.829l-1.171 -1.171a2 2 0 0 0 -2.829 0l-10.586 10.586a2.828 2.828 0 0 0 0 4z">
                    </path>
                    <path d="M4 20l1.768 -1.768"></path>
                </svg>
            </div>
        </a>
    @endif
    @if(auth()->user()?->role_id !== 4)
        <a href="" class="item">
            <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                    <path d="M15 19l2 2l4 -4"></path>
                </svg>
            </div>
        </a>
    @endif
    <a href="{{ route('home.list-appointment') }}" class="item">
        <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layers-intersect"
                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M8 4m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                <path d="M4 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
            </svg>
        </div>
    </a>
    <a href="#sidebarPanel" class="item" data-bs-toggle="offcanvas">
        <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 6l16 0"></path>
                <path d="M4 12l16 0"></path>
                <path d="M4 18l16 0"></path>
            </svg>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->
