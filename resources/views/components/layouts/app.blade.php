<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset("/assets/img/logo.png") }}" type="image/x-icon">

    <title>@yield("title", config("app.name"))</title>
    @vite("resources/js/frontend.js")
    @vite("resources/css/frontend.css")

</head>


<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg bg-body-tertiary sidebar-open app-loaded" data-bs-theme="dark"> <!--begin::App Wrapper-->
<div class="app-wrapper">

    <x-app.layout.header/>

    <x-app.layout.sidebar/>
    <x-toaster-hub />

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                @yield('header')
            </div>
        </div>
        <!--end::App Content Header-->

        <!--begin::App Content-->
        <div class="app-content">
{{--            @yield('content')--}}
            {{ $slot }}
        </div>
        <!--end::App Content-->
    </main>

    <x-app.layout.footer/>

    <div class="sidebar-overlay">

    </div>
</div>

</body>


</html>
