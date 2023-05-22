<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/argon/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/argon/assets/img/favicon.png">
    <title>Admin B7 | {{ isset($pageTitle) ? $pageTitle : '' }}</title>
    @include('back.layouts.inc.css')
    <livewire:styles/>

</head>

<body class="g-sidenav-show   bg-gray-100">
<div class="min-height-300 bg-primary position-absolute w-100"></div>
@include('back.layouts.utils.aside')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('back.layouts.utils.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    {{$slot}}
    </div>
</main>
@include('back.layouts.inc.js')


</body>

</html>
