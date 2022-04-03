<!DOCTYPE html>
<html lang="en" direction="{{config('app.direction')}}">
<head>
    <meta charset="utf-8"/>
    <title>{{config('app.name')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    @stack('cssHead')
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        var GlobalPath = '{{url('/admin')}}';
        var GlobalPublicPath = '{{url('/')}}';
    </script>
</head>

<!-- begin::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default @stack('bodyClass')">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
{{--    @include('admin.partials.header')--}}

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

{{--        @include('admin.partials.side_bar')--}}

        <div class="m-grid__item m-grid__item--fluid">
            @yield('content')
        </div>

{{--        @include('admin.partials.footer')--}}
    </div>
</div>

{{--<script src="{{ elixir('assets/admin/metronic/js/all.js') }}"></script>--}}
{{--<script src="{{ elixir('assets/admin/metronic/js/custom.js') }}"></script>--}}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
