<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Visitor Management | {{ 'oke' }}</title>
    @include('layouts.styles.css-styles')

</head>

<body>
    <div class="main-wrapper" id="homeApp">
        <header-bar></header-bar>
        <side-bar></side-bar>
        <div class="page-wrapper bg-wrapper" id="">
            {{-- {{ $slot }} --}}
            <router-view></router-view>
        </div>
    </div>

    <div class="sidebar-overlay" data-reff=""></div>

    @include('layouts.styles.js-styles')
    @vite(['resources/js/homeApp.js'])
    <script>
        if (!localStorage.getItem('acces_token')) {
            window.location.href = '/login'
        }
    </script>
</body>

</html>
