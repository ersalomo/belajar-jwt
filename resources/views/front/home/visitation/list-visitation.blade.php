<x-app-layout pageTitle="List Visitations">
{{--    <div class="extraHeader">--}}
{{--        <form class="search-form">--}}
{{--            <div class="form-group searchbox">--}}
{{--                <input type="text" class="form-control">--}}
{{--                <i class="input-icon">--}}
{{--                    <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>--}}
{{--                </i>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
    <div class="section mt-2 mb-2">
        <div class="section-title">Found {{__($visitations->count())}} results for "<span class="text-primary">Visitors</span>"</div>
        <div class="card">
            <ul class="listview image-listview media transparent flush">
                    @foreach ($visitations as $visitation)
                <li>
                    <a href="#" class="item">
                        <div class="imageWrapper">
                            <img src="{{$visitation->appointment->visitor->picture}}" alt="image" class="imaged w64">
                        </div>
                        <div class="in">
                            <div>
                                {{$visitation->appointment->visitor->firstname}}
                                <div class="text-muted">Lorem ipsum dolor sit amet...</div>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</x-app-layout>
