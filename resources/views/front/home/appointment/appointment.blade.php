<x-app-layout pageTitle="Make Appointment">
    <div class="section full mt-2 mb-2">
        <div class="wide-block mt-3 pb-1 pt-2">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <form method="post" action="{{ route('home.appointment.store') }}" id="appoinment-form">
                @csrf
                <div class="form-group boxed">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="kode">* <span class="text-dark">Visitation Type</span></label>
                            <select class="form-control" name="visitation_type">
                                <option value="">--choose--</option>
                                <option value="pribadi">pribadi</option>
                                <option value="dinas">dinas</option>
                                <option value="private">private</option>
                                <option value="business">business</option>
                            </select>
                        <span class="text-danger error-text visitation_type_error"></span>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="kode">* <span
                                    class="text-dark">Visit date</span></label>
                            <input type="date" name="visit_date" class="form-control" id="kode" placeholder="company name">
                        </div>
                        <span class="text-danger error-text visit_date_error"></span>
                    </div>

                    <div class="input-wrapper">
                        <label class="form-label" for="kode">* <span class="">Employee Name</span></label>
                        <input type="text" name="name_emp" class="form-control" id="kode"
                               placeholder="Enter employee name">
                        <span class="text-danger error-text name_emp_error"></span>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="kode">* <span
                                    class="text-dark">Company Name (optional)</span></label>
                            <input type="text" name="company_name" class="form-control" id="kode" placeholder="company name">
                        </div>
                        <span class="text-danger error-text company_name_error"></span>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="kode">* <span
                                    class="text-dark">Plate Number (optional)</span></label>
                            <input type="number" name=number_plate class="form-control" id="kode" placeholder="plate number">
                        </div>
                        <span class="text-danger error-text number_plate_error"></span>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="kode">* <span
                                    class="text-dark">Transportation (optional)</span></label>
                            <input type="text" name=transportation class="form-control" id="kode" placeholder="transportation name">
                        </div>
                        <span class="text-danger error-text transportation_error"></span>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="kode">* <span
                                    class="text-dark">Visitation time</span></label>
                            <input type="time" name=arrival_time class="form-control" id="kode" placeholder="company name">
                        </div>
                        <span class="text-danger error-text arrival_time_error"></span>
                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="form-label" for="Purpose">* Purpose</label>
                        <textarea id="Purpose" name="purpose" rows="5" class="form-control"></textarea>
                    </div>
                    <span class="text-danger error-text purpose_error"></span>
                </div>
                <div class="form-group boxed">
                    <button class="btn btn-primary btn-block">Submit</button>
                    <button class="btn btn-danger btn-block mt-1">cancel</button>
                </div>
            </form>

        </div>
    </div>
    <div id="success-created" class="toast-box toast-top">
        <div class="in">
            <ion-icon name="checkmark-circle" class="text-success md hydrated" role="img"
                      aria-label="checkmark circle"></ion-icon>
            <div class="text">
                Successfully created
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-success close-button">CLOSE</button>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#appoinment-form').on('submit', function (e) {
                    e.preventDefault();
                    e.stopPropagation()
                    const form = e.target
                    $.ajax({
                        url: form.action,
                        method: form.method,
                        data: new FormData(form),
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $(form).find("span.error-text").text("");
                        },
                        success: function (res) {
                            $(form)[0].reset();
                            const el = 'success-created'
                            $(`#${el} div.test`).text(res.msg)
                            toastbox(el, 2500)
                        },
                        error: function (res) {
                            $.each(res.responseJSON.errors, (prefix, val) => {
                                $("span." + prefix + "_error").text(val[0]);
                            });
                            console.log(res.responseJSON.message)
                        }

                    })
                })
            })
        </script>
    @endpush
</x-app-layout>
