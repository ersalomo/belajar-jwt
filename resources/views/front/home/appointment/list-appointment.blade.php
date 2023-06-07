<x-app-layout pageTitle="List Appointment">
    <div class="section-full">
        <ul id="list-appointments" class="listview image-listview flush">
        </ul>
    </div>
    <div id="success-approved" class="toast-box toast-bottom bg-success ">
        <div class="in">
            <div class="text">
                Success Approved
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
    </div>
    <div id="fail-approved" class="toast-box toast-bottom bg-danger ">
        <div class="in">
            <div class="text">
                Fail to approve Color
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
    </div>

    <div class="modal fade dialogbox " id="DialogIconedButtonInline" data-bs-backdrop="static" tabindex="-1"
         style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Approve Visitor</h5>
                </div>
                <div class="modal-body">
                    <img src="" class="image" width="45px">
                    <p>
                        Are you sure to approve this visitor?
                    </p>
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <form method="post">
                            <button class="btn btn-text-info" data-bs-dismiss="modal">
                                <ion-icon name="checkmark-outline" role="img" class="md hydrated"
                                          aria-label="checkmark-outline"></ion-icon>
                                Approve
                            </button>
                        </form>
                        <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal">
                            <ion-icon name="close-outline" role="img" class="md hydrated"
                                      aria-label="close-outline"></ion-icon>
                            Close
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="notification-approve" class="notification-box">

    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                const ul = $('#list-appointments');

                let emp = {}
                const loadData = () => {
                    ul.empty();
                    $.get('{{ route('home.appointment.lists') }}', function ({data}, status) {
                        $.each(data, function (index, val) {
                            // emp = val["employee"]
                            const visitor = val["visitor"];
                            const li = $('<li>').addClass("");
                            const item = ` <a href="#" class="item" data-id="${val["id"]}">
                                <img src="${visitor["detail"]["picture"]}" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        <input type="hidden" value="${val["id"]}"/>
                                        <div class="mb-05"><strong>${visitor.name}</strong></div>
                                        <div class="text-small mb-05">${val["purpose"]}</div>
                                        <div class="text-xsmall">${val["created_at"]}</div>
                                    </div>
                                    <span class="badge ${val['status'] === 'approved' ? 'badge-primary' : 'badge-danger'} badge-empty"></span>
                                </div>
                            </a>`;

                            li.html(item);
                            if (index === data.length - 1) {
                                li.hide().appendTo(ul).fadeIn('slow');
                            } else {
                                ul.append(li);
                            }
                        });

                    });
                }; //end

                loadData();

                @if(auth()->user()->role_id === 2)
                let id;
                $('#list-appointments').on('click', 'li', function (e) {
                    const visitor = $(this).find('img').attr('src');
                    id = $(this).find('input').val()
                    $('#DialogIconedButtonInline').modal('show');
                    $('#DialogIconedButtonInline img').attr('src', visitor);
                });

                $('#DialogIconedButtonInline').on('submit', 'form', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const url = "/oa/appointment/update-approve/" + id;
                    const method = "post";
                    $.ajax({
                        url,
                        method,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success(res) {
                            loadData()
                            toastbox('success-approved', 2500);
                        },
                        error(res) {
                            console.log(res);
                            toastbox('fail-approved', 2500);
                        },
                    });
                });
                @endif

                const notificationElementPopup = (user) => {
                    const {firstname, picture} = user
                    document.getElementById('notification-approve').innerHTML = `
                    <div class="notification-dialog ios-style">
                                <div class="notification-header">
                                    <div class="in">
                                        <img src="${picture}" alt="image" class="imaged w24 rounded">
                                        <strong>Pablo Cambeiro</strong>
                                    </div>
                                    <div class="right">
                                        <span>just now</span>
                                        <a href="#" class="close-button">
                                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                        </a>
                                    </div>
                                </div>
                                <div class="notification-content">
                                    <div class="in">
                                        <h3 class="subtitle">Hello There</h3>
                                        <div class="text">
                                            ${firstname} has been approved your appointment
                                        </div>
                                    </div>
                                    <div class="icon-box text-success">
                                        <ion-icon name="checkmark-circle-outline" role="img" class="md hydrated" aria-label="checkmark circle outline"></ion-icon>
                                    </div>
                                </div>
                            </div>`
                }
                window.Echo
                    .private(`handle-notif-{{auth()->user()->id}}`)
                    .listen('.handle.notif', (e) => {
                        const emp = e.data
                        notificationElementPopup(emp)
                        notification('notification-approve' , 2500)
                        loadData();
                    })
            });
        </script>
    @endpush
</x-app-layout>
