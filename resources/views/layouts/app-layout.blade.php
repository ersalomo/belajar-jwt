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
    <div class="main-wrapper">
        {{ $slot }}
    </div>
</body>
<div class="sidebar-overlay" data-reff=""></div>
@include('layouts.styles.js-styles')

</html>
