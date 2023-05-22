<x-app-layout pageTitle="Detail Appointment">
    <div class="p-1">
        <div class="col-10 mt-3 mx-auto">
            <div class="card card-plain text-center">
                <a href="javascript:void();" class="mt-1">
                    <img class="avatar avatar-sm" src="{{__($appointment->visitor->picture)}}" height="80">
                </a>
                <div class="card-body">
                    <h4 class="card-title">{{__($appointment->visitor->firstname)}}</h4>
                    <h6 class="category text-info text-gradient">Loan Counselor</h6>
                    <p class="card-description">
                        "{{__($appointment->purpose)}}"
                    </p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-outline-danger">Reject</button>
                    <button class="btn btn-facebook">Approve</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
