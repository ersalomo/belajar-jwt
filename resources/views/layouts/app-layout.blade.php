<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.styles.css-styles')
    <title>Visitor Management | {{ $pageTitle }}</title>
    <meta charset="utf-8">
</head>

<body>
    <div class="main-wrapper" id="authApp">
        <router-view></router-view>
    </div>
</body>
<div class="sidebar-overlay" data-reff=""></div>
@include('layouts.styles.js-styles')
@vite(['resources/js/app.js'])
<script>
    window.addEventListener("showToastr", function(event) {
        toastr.remove();
        if (event.detail.type === 'info') {
            toastr.info(event.detail.message)
        } else if (event.detail.type === 'success') {
            toastr.success(event.detail.message)
        } else if (event.detail.type === 'error') {
            toastr.error(event.detail.message)
        } else if (event.detail.type === 'warning') {
            toastr.warning(event.detail.message)
        } else {
            return false
        }
    })
</script>

</html>
