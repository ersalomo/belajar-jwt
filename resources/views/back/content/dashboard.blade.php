<x-back.app-layout page-title="Dashboard">
    @section('breadcrumb')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:">Admin</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    @endsection
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Visitors</p>
                                <h5 class="font-weight-bolder">
                                    {{__($total_employees)}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-user-run text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Employees</p>
                                <h5 class="font-weight-bolder">
                                    {{__($total_visitors)}}
                                </h5>

                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Appointments</p>
                                <h5 class="font-weight-bolder">
                                    {{__($total_appointments)}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Visitations</p>
                                <h5 class="font-weight-bolder">
                                    {{__($total_visitations)}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        @include('back.content.visitation.utils.visitation-overview')
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header pb-0 p-3 d-flex">
                    <h6 class="mb-0">List Visitors Checkin</h6>
                    Checkin<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up" aria-hidden="true"></i></button>
                    Checkout<button class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down" aria-hidden="true"></i></button>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @foreach($visitors_checkin as $visitor)
{{--                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <img src="{{__($visitor->appointment?->visitor["detail"]->picture)}}"--}}
{{--                                         class="img avatar-sm rounded-1 me-3"/>--}}
{{--                                    <div class="d-flex flex-column">--}}
{{--                                        <h6 class="mb-1 text-dark text-sm">{{$visitor->appointment->visitor["name"]}}</h6>--}}
{{--                                        <span class="text-xs">250 in stock, <span--}}
{{--                                                class="font-weight-bold">346+ sold</span></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex">--}}
{{--                                    <button--}}
{{--                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">--}}
{{--                                        <i class="ni ni-bold-right" aria-hidden="true"></i></button>--}}
{{--                                </div>--}}
{{--                            </li>--}}

                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    @if($visitor->checkout)
                                        <button class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down" aria-hidden="true"></i></button>

                                    @else
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up" aria-hidden="true"></i></button>
                                    @endif
                                    <img src="{{__($visitor->appointment?->visitor["detail"]->picture)}}"
                                         class="img avatar-sm rounded-1 me-3"/>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">{{__($visitor->appointment->visitor["name"])}}</h6>
                                        <span class="text-xs">{{$visitor->created_at}}, at </span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    i
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-secondary opacity-7"></th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ">Visitor</th>
                        <th class="text-center ps-2 text-uppercase text-dark text-xxs font-weight-bolder">Regarding</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ">Employee</th>
                        <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder ">Date</th>
                        <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder ">arrival time</th>
                        <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder ">status</th>
                        <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder ">Purpose</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                            <tr>
                                <td class="align-middle">
                                    <a href="{{route('admin.visit.create-new-visitation', ['id' => $appointment['id']])}}" class="text-white font-weight-bold text-xs btn btn-xs btn-primary" data-toggle="tooltip"
                                       data-original-title="Edit user">
                                        add-visit
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-0">
                                        <div>
                                            <img src="{{$appointment['visitor']->detail?->picture ?? ''}}"
                                                 class="avatar avatar-sm me-3">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">{{$appointment['visitor']->name ?? ''  }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{($appointment['visitor']->email ?? '')}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold">{{($appointment->visitation_type)}}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{__($appointment->name_emp)}}</p>
{{--                                                                        <p class="text-xs text-secondary mb-0">{{__($appointment->employee->department)}}</p>--}}
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm text-dark">{{($appointment->created_at)}}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm text-dark">{{($appointment->arrival_time)}}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="badge badge-sm text-dark  bg-gradient-faded-{{($appointment->status == 'pending') ? 'primary': ($appointment->status == 'approved' ? 'success': "danger")}}">{{($appointment->status)}}</span>
                                </td>
                                <td class="align-middle text-start" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="{{($appointment->purpose)}}">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{Str::words($appointment->purpose, 5)}}</span>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        ,
                        Visitor Management System
                        <i class="fa fa-users"></i> by
                        <a href="#" class="font-weight-bold" target="_blank">Z</a>.
                    </div>
                </div>
            </div>
        </div>
    </footer>
</x-back.app-layout>
