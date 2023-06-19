<x-back.app-layout page-title="Data Appointments">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="">Appointment table</h6>
                    <div class="d-flex m-0">
                        <button class="ms-auto btn btn-primary col-md-2">
                            <i class="fa fas-edit"></i>
                            add
                        </button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">

                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                    Visitor
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                    Employee
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                    Purpose
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                    Visit Type
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                    Company Name
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                    Transportation
                                </th>

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                    Status
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                    created
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td class="align-middle">
                                        <a href="javascript:void();" class="text-secondary font-weight-bold text-xs"
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{$appointment->visitor['detail']->picture}}"
                                                     class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{__($appointment->visitor->name)}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{__($appointment->name_emp)}}</p>
                                    </td>
                                    <td class="align-middle text-start">
                                        <span class="text-secondary text-xs font-weight-bold">{{__($appointment->purpose)}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{$appointment['visitation_type']}}</span>
                                    </td>
                                    <td class="align-middle text-start">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{__($appointment->company_name)}}</span>
                                        {{--                                        <p class="text-xs text-secondary mb-0">{{__($appointment->title)}}</p>--}}
                                    </td>
                                    <td class="align-middle text-start">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{__($appointment->transportation)}}</span>
                                                                                <p class="text-xs text-secondary mb-0">{{__($appointment->number_plate)}}</p>
                                    </td>
                                    <td class="align-middle text-start text-sm">
                                        @if($appointment->status == 'pending')
                                            <span class="badge badge-sm bg-gradient-warning">pending</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-success">approved</span>
                                        @endif
                                    </td>

                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{__($appointment->created_at)}}</span>
                                        {{--                                        <p class="text-xs text-secondary mb-0">{{__($appointment->title)}}</p>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <x-paginate :data="$appointments"/>

    </div>
</x-back.app-layout>
