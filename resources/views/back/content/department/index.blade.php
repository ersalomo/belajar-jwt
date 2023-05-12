<x-back.app-layout page-title="Table Roles">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Department table</h6>
                    @include('back.content.department.modal.create')
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NO</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    id
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Department
                                </th><th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Title
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td class="text-bold text-center w-5">#</td>
                                    <td class="text-bold text-center w-5">{{$loop->iteration}}</td>
                                    <td class="text-bold text-start">{{$department->department}}</td>
                                    <td class="text-bold text-start">{{$department->title}}</td>
                                    <td class="text-bold text-start ">
                                        <a href="" class="text-secondary font-weight-bold text-xs"
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <a href="" class="text-secondary font-weight-bold text-xs"
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Delete
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

    </div>
</x-back.app-layout>
