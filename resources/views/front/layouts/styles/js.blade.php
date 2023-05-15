    <!-- * welcome notification -->
    <!-- ============== Js Files ==============  -->
    <script src="/jQuery/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="/front/view29/assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="/front/view29/assets/js/plugins/splide/splide.min.js"></script>
    <!-- ProgressBar js -->
    <script src="/front/view29/assets/js/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- Base Js File -->
{{--    <script src="/front/view29/assets/js/base.js"></script> --}}
    <script src="/front/view29/assets/js/base2.js"></script>

    <script>
        // // Trigger welcome notification after 5 seconds
        // setTimeout(() => {
        //     notification('notification-welcome', 5000);
        // }, 2000);
    </script>
    <script src="/ijabo-croptool/ijaboCropTool.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
    <livewire:scripts/>
    @stack('scripts')

