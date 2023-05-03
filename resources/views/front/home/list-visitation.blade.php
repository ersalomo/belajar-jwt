<x-app-layout pageTitle="List Visitations">
    <div class="mx-1">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
    <div class="card mx-3">
        <div class="my-2 py-2">
            <label class="ms-3">Search:
                <input type="search" class="form-control search-result">
            </label>
            <label class="ms-auto">Total: {{ count($visitations) }} Visitors
            </label>
        </div>
    </div>
    @foreach ($visitations as $visitation)
        <div class="section mt-2">
            <div class="row">
                <div class="col">
                    <div class="card card-profile card-plain">
                        <div class="card-body ps-1 d-flex">
                            <div class="position-relative w-4">
                                <div class="blur-shadow-avatar">
                                    <img class="avatar avatar-sm shadow-lg"
                                         src="{{$visitation->appointment->visitor->picture}}"
                                         width="80px"
                                         height="70px">
                                </div>
                            </div>
                            <div class="mx-2">
                                <h5 class="mb-0">{{$visitation->appointment->visitor->firstname}}</h5>
                                <p class="text-muted">CEO / Co-Founder</p>
                                <p class="mb-0">Purpose: </p>
                                <p>
                                    {{$visitation->appointment->purpose}}
                                </p>
                                <p class="mb-0">Visitation from: </p>
                                <p>
                                    {{$visitation->appointment->employee->firstname}}
                                </p>
                            </div>
                            <div class="btn btn-group ms-auto">
                            <button type="button" class="btn-icon-only btn-simple btn btn-lg btn-twitter"
                                    data-toggle="tooltip" data-placement="bottom" title="Follow me!">
                                checkin
                            </button>
                            <button type="button" class="btn-icon-only btn-simple btn btn-lg btn-dribbble"
                                    data-toggle="tooltip" data-placement="bottom" title="Follow me!">
                                checkout
                            </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
