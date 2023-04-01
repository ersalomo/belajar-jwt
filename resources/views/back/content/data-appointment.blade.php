<x-back.app-layout page-title="Data Appointments">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Appointment table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Visitor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Employee</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Visit Type</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Purpose</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="/{{$appointment->picture}}" class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{__($appointment->visitor->firstname)}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{__($appointment->employee->firstname)}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($appointment->type == 'personil')
                                            <span class="badge badge-sm bg-gradient-info">personil</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-success">group</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($appointment->status == 'pending')
                                            <span class="badge badge-sm bg-gradient-warning">pending</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-success">approved</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{__($appointment->purpose)}}</span>
                                        <p class="text-xs text-secondary mb-0">{{__($appointment->title)}}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:void();" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
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
