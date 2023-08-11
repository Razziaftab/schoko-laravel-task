<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Schokoladenseite</title>

{{--    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"--}}
{{--          crossorigin="anonymous"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>
@include('partials.header')
<main>
    @yield('content')
</main>
@include('partials.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{--<script src="{{ asset('assets/js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/toastr.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/slick.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/wow.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/custom.js') }}"></script>--}}

{{--@if(session('message'))--}}
{{--    {!! \App\Helpers\Helper::TOAST(session('alert_type'), session('message')) !!}--}}
{{--@endif--}}

</body>
</html>
