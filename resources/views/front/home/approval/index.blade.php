<x-app-layout pageTitle="List Visitations">
    <div class="section full">
        <livewire:approval-visitor/>
    </div>
    <div class="modal fade dialogbox" id="DialogIconedButtonInline" data-bs-backdrop="static" tabindex="-1"
         role="dialog" aria-modal="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Approved Checkout</h5>
                </div>
                <div class="modal-body">
                    Are you sure to Approved thi visitor?

                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <button class="btn btn-text-danger" data-bs-dismiss="modal">
                            <ion-icon name="trash-outline" role="img" class="md hydrated"
                                      aria-label="trash outline"></ion-icon>
                            Cancel
                        </button>
                        <button class="btn btn-text-primary">
                            <ion-icon name="share-outline" role="img" class="md hydrated"
                                      aria-label="share outline"></ion-icon>
                            Approve
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="success-approved" class="toast-box toast-center">
        <div class="in">
            <ion-icon name="checkmark-circle" class="text-success md hydrated" role="img" aria-label="checkmark circle"></ion-icon>
            <div class="text">
                Success Approved
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            Livewire.on('openModalApprove', ({id}) => {
                $('#DialogIconedButtonInline').modal('show');
                $('.modal-footer .btn-text-primary').on('click', function () {
                    Livewire.emit('approveCheckout', id)
                    console.log(id)
                });
            })
            Livewire.on('approvedCloseModel', (res) => {
                $('#DialogIconedButtonInline').modal('hide');
                toastbox('success-approved', 2500)
            })
        </script>
    @endpush
</x-app-layout>
