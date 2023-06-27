@php
    $card_menus = [
        "approval-index" => [
            "url" => route("home.approval.index"),
            "access_by" => [2],
              "icon" => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                <path d="M15 19l2 2l4 -4"></path>
                            </svg>'

        ],
        "list-visitations" => [
            "url" => route('home.list-visitations'),
            "access_by" => [3],
             "icon" => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M13 5h8"></path>
                            <path d="M13 9h5"></path>
                            <path d="M13 15h8"></path>
                            <path d="M13 19h5"></path>
                            <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                            <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        </svg>'

        ],
        "face-recognition" => [
            "url" => route('home.face-recog'),
            "access_by" => [3],
            "icon" => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 19l18 0"></path>
                                <path
                                    d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z"></path>
                       </svg>'

        ],
//        "create-feedback" => [
//            "url" => route('home.approval.create-feedback', auth()->user()->appointment()->visit()),
//            "access_by" => [4],
//            "icon" => ''
//
//        ],
];
@endphp

@foreach($card_menus as $menu)
    <div class="card col-5 p-2">
        <a class="btn" href="{{$menu["url"]}}">
            {!! $menu["icon"] !!}
        </a>
    </div>
@endforeach
{{--<script>--}}
{{--    alert("oke")--}}
{{--</script>--}}
