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
                    <div class="input-wrapper">
                        <label class="form-label" for="kode">* <span class="text-danger">Kode Employee</span></label>
                        <input type="text" name="kode_emp" class="form-control" id="kode"
                               placeholder="Enter kode employee">
                        <span class="text-danger error-text kode_emp_error"></span>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="kode">* <span class="text-dark">Type kunjungan</span></label>
                            <select class="form-control" name="type">
                                <option value="personil">personil</option>
                                <option value="group">group</option>
                            </select>
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
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="kode">* <span
                                    class="text-dark">Company Name (optional)</span></label>
                            <input type="text" name="company_name" class="form-control" id="kode" placeholder="company name">
                        </div>
                        <span class="text-danger error-text company_name_error"></span>
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
