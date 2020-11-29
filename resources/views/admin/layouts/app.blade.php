<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    @include('admin.partials.includes.css')
    @include('admin.partials.includes.top_js')
</head>
<body>
@include('admin.partials.left')
<div class="page d-flex flex-column">
    @include('admin.partials.header')

    <div class="container">
        <main class="w-100 py-5">
            @yield('content')
        </main>
    </div>
    @if(request()->route()->getName() == 'admin.home')
        <div class="backGround d-flex col justify-content-center align-items-center"><img class="w-100"
                                                                                          style="max-width: 400px;"
                                                                                          src="{{asset('images/ov_e_uzum_darnal_milionater_xax.png')}}">
        </div>
    @endif
    @include('admin.partials.footer')
</div>
@include('admin.partials.includes.bottom_js')
</body>
</html>
