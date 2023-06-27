<div class="col-5 card p-2">
    <a class="btn" href="#offcanvas-right" data-bs-toggle="offcanvas">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell" width="24"
             height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
             stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path
                d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
        </svg>
        @if($notifications->count())
            <span class="badge badge-primary badge-empty mt-0"></span>
        @endif
    </a>
    <span class="text-dark text-uppercase text-center">Notification</span>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-right" style="visibility: hidden;"
         aria-modal="true"
         role="dialog">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Notifications</h5>
            <a href="#" class="offcanvas-close" data-bs-dismiss="offcanvas">
                <ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
            </a>
        </div>
        <div class="offcanvas-body">
            <div class="section">
                <div class="pt-2 pb-2">
                    <!-- comment block -->
                    <div class="comment-block">
                        @foreach($notifications as $nf)
                            <div class="item">
                                {{--                        <div class="avatar">--}}
                                {{--                            <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w32 rounded">--}}
                                {{--                        </div>--}}
                                <div class="in">
                                    <div class="comment-header">
                                        <h4 class="title">{{$nf['title']}}</h4>
                                        <span class="time">{{$nf['created_at']}}</span>
                                    </div>
                                    <div class="text">
                                        {{$nf['body']}}
                                    </div>
                                    <div class="comment-footer">
                                        <a href="#" class="comment-button"
                                           wire:click.prevent="markAsRead({{$nf["id"]}})">
                                            <ion-icon name="checkmark-done-outline" role="img" class="md hydrated"
                                                      aria-label="chatbubble outline"></ion-icon>
                                            Mark as read
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- * comment block -->
                </div>
            </div>

        </div>
    </div>
</div>
