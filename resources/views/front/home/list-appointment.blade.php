<x-app-layout pageTitle="List Appointment">
    <div id="list-appointments"></div>
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
    @push('scripts')
        <script>
            $(document).ready(function () {
                const container = $('#list-appointments');
                const loadData = () => {
                    $.get('{{ route('home.appointment.lists') }}', function ({data}, status) {
                        $.each(data, function (index, val) {
                            const divSection = $('<div>').addClass('section mt-2');
                            let divCard;
                            if (val.status === 'pending') {
                                divCard = $('<div>').addClass('card bg-warning');
                            } else if (val.status === 'rejected') {
                                divCard = $('<div>').addClass('card bg-danger');
                            } else {
                                divCard = $('<div>').addClass('card bg-success');
                            }
                            const divCardBody = $('<div>').addClass('card-body');
                            const h6 = $('<h6>').addClass('card-subtitle').text(`#APPOINTMENT ${index+1} ${val.status}`);
                            const p = $('<p>').addClass('card-text').text(val.purpose);
                            divCardBody.append(h6, p);

                            @if(auth()->user()->role_id !== 4)
                            const form = $('<form>')
                                .attr('action', `appointment/update-approve/${val.id}`)
                                .attr('method', 'post')
                            const csrf = $('<input>').attr('type', 'hidden').attr('name', '_token').val('{{ csrf_token() }}');
                            const method = $('<input>').attr('type', 'hidden').attr('name', '_method').val('PUT');
                            const button = $('<button>').attr('type', 'submit').addClass('btn btn-android').text('approve');
                            form.append(csrf,method, button);
                            form.on('submit', approve)
                            divCardBody.append(form);
                            @endif
                            divCard.append(divCardBody);
                            divSection.append(divCard);

                            // Tambahkan animasi ketika menambahkan elemen terakhir pada container
                            if (index === data.length - 1) {
                                divSection.hide().appendTo(container).fadeIn('slow');
                            } else {
                                container.append(divSection);
                            }
                        });

                    });
                }
                loadData();

                window.Echo.channel("Appointment").listen(".appointment", (e) => {
                    container.empty(); // kosongkan container terlebih dahulu sebelum mengambil data yang baru
                    loadData();
                    console.log(e)
                });

                const approve = (e) => {
                        e.preventDefault()
                        e.stopPropagation()
                        const ths = e.target
                        $.ajax({
                            url: ths.action,
                            method: ths.method,
                            processData: false,
                            contentType: false,
                            dataType: 'json',
                            success(res){
                                toastbox('success-approved', 2500)
                                container.empty()
                                loadData()
                            },
                            error(res){
                                console.log(res)
                                toastbox('fail-approved', 2500)
                            },
                        })
                }
            });
        </script>
    @endpush
</x-app-layout>
