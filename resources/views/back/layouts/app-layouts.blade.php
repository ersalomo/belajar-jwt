<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/argon/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/argon/assets/img/favicon.png">
    <title>
        Argon Dashboard 2 by Creative Tim
    </title>
    @include('back.layouts.inc.css')
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
