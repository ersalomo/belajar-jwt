<x-app-layout pageTitle="Home">
    @php
        $user = auth()->user()
    @endphp
    <div class="section mt-3 mb-3">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-end">
                <div>
                    <h6 class="card-subtitle">Welcome</h6>
                    <h5 class="card-title mb-0 d-flex align-items-center justify-content-between">
                        {{ __('User '.auth()->user()->name) }}
                    </h5>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodecontent">
                    <label class="form-check-label" for="darkmodecontent"></label>
                </div>
            </div>
        </div>
    </div>

    <div class="section mt-3 mb-3">
        <div class="row pt-4 px-2 justify-content-around">
            <div class="card p-2 mb-2 col-5">
                <a class="btn" href="{{route('home.approval.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check"
                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                        <path d="M15 19l2 2l4 -4"></path>
                    </svg>
                </a>
                <span class="text-dark text-uppercase text-center">Visitor Checkin</span>
            </div>

            <div class="card p-2 mb-2 col-5">
                <a class="btn" href="{{route('home.list-visitations')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details"
                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M13 5h8"></path>
                        <path d="M13 9h5"></path>
                        <path d="M13 15h8"></path>
                        <path d="M13 19h5"></path>
                        <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                    </svg>
                </a>
                <span class="text-dark text-uppercase text-center">List Visitations</span>
            </div>
            <div class="card p-2 mb-2 col-5">

                @if($user["role_id"] == 3)
                    <a class="btn" href="{{route('home.face-recog')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 19l18 0"></path>
                            <path
                                d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z"></path>
                        </svg>
                    </a>
                    <span class="text-dark text-uppercase text-center">Face Recognition</span>
                @else
                    <a class="btn" href="{{route('home.get.face-screening')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 19l18 0"></path>
                            <path
                                d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z"></path>
                        </svg>
                    </a>
                    <span class="text-dark text-uppercase text-center">Face Screening</span>
                @endif
            </div>
            <div class="card p-2 mb-2 col-5">

                @php
                    $ids = $user->appointment()->pluck("id");
                    $visitVisitor = \App\Models\Visit::whereIn('appointment_id',$ids)->latest()->first();
                    if(!$visitVisitor) ($url = "#");
                    else ($url = route('home.to-checkout-visit',$visitVisitor["id"]));
                @endphp
                <a class="btn"
                   href="{{$url}}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="icon icon-tabler icon-tabler-message-check"
                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 9h8"></path>
                        <path d="M8 13h6"></path>
                        <path
                            d="M10.99 19.206l-2.99 1.794v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6"></path>
                        <path d="M15 19l2 2l4 -4"></path>
                    </svg>
                </a>
                <span class="text-dark text-uppercase text-center">Feedback</span>
            </div>
            {{--            @endif--}}
            <x-notification-menu/>
            {{--                if cliked to show that he has an visitations today--}}
            <div class="col-5 card p-2">
                @if(!$user->imageExists())
                    <a class="btn text-primary" onclick="toastbox('verified-visitor', 3500)">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="icon icon-tabler icon-tabler-discount-check-filled" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944zm3.697 7.282a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                                stroke-width="0" fill="currentColor"></path>
                        </svg>
                    </a>
                @else
                    <a class="btn text-danger" onclick="toastbox('not-verified-visitor', 3500)">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="icon icon-tabler icon-tabler-discount-check-filled" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944zm3.697 7.282a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                                stroke-width="0" fill="currentColor"></path>
                        </svg>
                    </a>
                @endif
                <span class="text-dark text-uppercase text-center">Status</span>
            </div>
        </div>
        {{--    </div>--}}
        {{--notify--}}
        <div id="verified-visitor" class="toast-box toast-top">
            <div class="in">
                <ion-icon name="checkmark-circle" class="text-success md hydrated" role="img"
                          aria-label="checkmark circle"></ion-icon>
                <div class="text">
                    You're already verified
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-text-success close-button">CLOSE</button>
        </div>
        <div id="not-verified-visitor" class="toast-box toast-top">
            <div class="in">
                <ion-icon name="close-outline" class="text-danger md hydrated" role="img"
                          aria-label="close-outline"></ion-icon>
                <div class="text">
                    You're not verified yet
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-text-success close-button">CLOSE</button>
        </div>
    </div>
</x-app-layout>
