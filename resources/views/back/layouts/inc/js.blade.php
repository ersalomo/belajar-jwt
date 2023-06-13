<!--   Core JS Files   -->
<script src="/jQuery/jquery-3.6.0.min.js"></script>
<script src="/argon/assets/js/core/popper.min.js"></script>
<script src="/argon/assets/js/core/bootstrap.min.js"></script>
<script src="/argon/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/argon/assets/js/plugins/smooth-scrollbar.min.js"></script>

<script>
    const win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        const options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/argon/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
{{--select 2--}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--end select 2--}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $("meta[name=csrf-token]").attr('content')
        }
    })
</script>
@stack('scripts')
@livewireScripts
