<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <livewire:styles />
    @include('front.layouts.styles.css')
</head>

<body>
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->
    {{-- <livewire:auth.login /> --}}
    <livewire:auth />
</body>
<livewire:scripts />
@include('front.layouts.styles.js')

</html>
