<x-back.app-layout page-title="Data visitation">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Visitation table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Appointment
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name Visitor
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Visit Date
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Checkin
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Checkout
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Notes
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($visitations as $visitation)
                                <tr>
                                    <td class="align-middle">
                                        <a href="javascript:void();" class="btn btn-bitcoin btn-xs btn-warning" data-toggle="tooltip"
                                           data-original-title="Edit user">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-ballpen" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 6l7 7l-4 4"></path>
                                                <path
                                                    d="M5.828 18.172a2.828 2.828 0 0 0 4 0l10.586 -10.586a2 2 0 0 0 0 -2.829l-1.171 -1.171a2 2 0 0 0 -2.829 0l-10.586 10.586a2.828 2.828 0 0 0 0 4z"></path>
                                                <path d="M4 20l1.768 -1.768"></path>
                                            </svg>
                                        </a>
                                        <a href="javascript:void();" class="btn btn-bitcoin btn-xs btn-danger" data-toggle="tooltip"
                                           data-original-title="Edit user">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 7l16 0"></path>
                                                <path d="M10 11l0 6"></path>
                                                <path d="M14 11l0 6"></path>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                        </a>
                                        <a href="javascript:void();" class="btn btn-bitcoin btn-xs btn-info" data-toggle="tooltip"
                                           data-original-title="Edit user">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{mt_rand(0, 0xFFFFFF)}}{{__($visitation->id_appmt)}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{__($visitation->email)}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-0">
                                            <img src="{{__($visitation->appointment->visitor->picture)}}" class="avatar avatar-sm me-3"
                                                 alt="user1">
                                        <p class="text-xs font-weight-bold mb-0 mt-2">
                                            {{__($visitation->appointment->visitor->firstname)}}
                                        </p>
                                        </div>
                                    </td>
                                    <td>
                                        {{$visitation->visit_date}}
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($visitation->checkin)
                                            <span class="badge badge-sm bg-gradient-success">Checkin</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-danger">Not Checkin</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($visitation->checkout)
                                            <span class="badge badge-sm bg-gradient-success">Checkout</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-danger">Not Checkout</span>
                                        @endif
                                    </td>

                                    <td class="text-start p-0 text-xs">
                                     {{__(mb_strimwidth($visitation->notes,0,20, '...'))}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-back.app-layout>
