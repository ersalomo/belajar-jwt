<x-back.app-layout page-title="Data Employee">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Employee table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">phone</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="/{{$employee->picture}}" class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{__($employee->firstname)}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{__($employee->email)}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{__($employee->phone)}}</p>
{{--                                    <p class="text-xs text-secondary mb-0">Organization</p>--}}
                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if(!$employee->is_blocked)
                                    <span class="badge badge-sm bg-gradient-success">aktif</span>
                                    @else
                                    <span class="badge badge-sm bg-gradient-danger">blocked</span>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{__($employee->department)}}</span>
                                    <p class="text-xs text-secondary mb-0">{{__($employee->title)}}</p>
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
        <x-paginate :data="$employees"/>

    </div>
</x-back.app-layout>
