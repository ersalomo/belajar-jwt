<x-app-layout pageTitle="Make Appointment">
    <div class="section mt-2 mb-2">
        <div class="card bg-primary comment-box">
            <img src="{{auth()->user()['detail']['picture']}}" alt="avatar" class="imaged w140 rounded">
            <input type="file" name="file" id="changeAuthorPictureFile" class="d-none"
                   onchange="this.dispatchEvent(new InputEvent('input'))">
            <button class="btn-sm mx-auto btn-primary rounded shadowed w16"
                    onclick="event.preventDefault();document.getElementById('changeAuthorPictureFile').click();">
                <span class="justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                        <path d="M16 5l3 3"></path>
                        <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                    </svg>
                </span>
            </button>
            <h4 class="card-title">{{ __(auth()->user()->name) }}</h4>
            <div class="card-text">{{auth()->user()->created_at}}</div>
            <div class="text">
            </div>
        </div>
    </div>
    <livewire:profile-setting/>
    @push('scripts')
        <script>
            $(function () {
                $("#changeAuthorPictureFile").ijaboCropTool({
                    preview: '',
                    setRatio: 1,
                    allowedExtensions: ['jpg', 'jpeg', 'png'],
                    buttonsText: ['CROP', 'QUIT'],
                    buttonsColor: ['#30bf7d', '#ee5155', -15],
                    processUrl: "{{ route('home.change-profile-picture') }}",
                    withCSRF: ['_token', '{{ csrf_token() }}'],
                    onSuccess: function (message, element, status) {
                        console.log(message, element, status)
                    },
                    onError: function (message, element, status) {
                        console.log("err",message,element,status)
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
