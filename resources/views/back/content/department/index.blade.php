<x-back.app-layout page-title="Table Roles">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Department table</h6>
                    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModalMessage">
                        Add
                    </button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-dark text-xs font-weight-bolder">NO</th>
                                <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                    id
                                </th>
                                <th class="text-uppercase text-dark text-xs font-weight-bolder -7 ps-2">
                                    Department
                                </th>

                                <th class="text-secondary "></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td class="text-bold font-weight-bolder text-center w-5">#</td>
                                    <td class="text-bold text-xs font-weight-bolder text-start w-5">{{$department['id']}}</td>
                                    <td class="text-bold text-xs font-weight-bolder text-start">{{$department->department}}</td>
                                    <td class="text-bold text-xxs font-weight-bolder text-start">
                                        <a href="/sds" class="text-xs btn btn-warning"
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <a href="/app" class="text-xs btn btn-danger"
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
    <div class="modal fade" id="exampleModalMessage" tabindex="-1" aria-labelledby="exampleModalMessageTitle"
         aria-modal="true" role="dialog" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" action="{{route('admin.department.store')}}" method="post" id="department-form">

                    <div class="modal-body">
                        {{--                            <div class="form-group">--}}
                        {{--                                <label for="recipient-name" class="col-form-label">Recipient:</label>--}}
                        {{--                            </div>--}}
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Department Name</label>
                            <input type="text" name="department" class="form-control" value="" id="recipient-name"
                                   onfocus="focused(this)" onfocusout="defocused(this)">
                            {{--                                <textarea class="form-control" id="message-text" data-gramm="false" wt-ignore-input="true"></textarea>--}}
                            <span class="text-danger error-text department_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    @include('back.content.department.modal.create')
    @push('scripts')
        <script>
            $(function () {
                $('#department-form').on('submit', function (e){
                    e.preventDefault()
                    $.ajax({
                        url : e.target['action'],
                        method: e.target['method'],
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        data : new FormData(e.target),
                        beforeSend(res) {
                            $(e.target).find('span.error-text').text('')
                        },
                        success(res){
                            $(e.target)[0].reset();
                            $('#exampleModalMessage').modal('hide')

                        },
                        error({responseJSON}){
                            $.each(responseJSON.errors, (prefix, val) => {
                                $("span." + prefix + "_error").text(val[0]);
                            });
                        }
                    })
                });
            })
            !function (){}()
        </script>
    @endpush

</x-back.app-layout>

