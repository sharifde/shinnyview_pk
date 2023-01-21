<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="og:image" content="{{ asset('/') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ShinnyView.com</title>
        <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.min.css')}}" />
        <link rel="shortcut icon" type="image/jpg" href="{{asset('/images/favicon.jpeg')}}"/>
        <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
	  <link rel="stylesheet" href="{{asset('css')}}/external-style.css">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <script src="{{asset('libraries/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('libraries/bootstrap/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('libraries/sweet-alert/sweet_alert.min.js')}}"></script>
        <link href="{{asset('libraries/select2/select2.min.css')}}" rel="stylesheet" />

        @stack('css')
        @livewireStyles
    </head>
    <body>
        <div class="d-flex">
            @include('agent.components.sidebar')
            <div class="flex-1">
                @include('agent.components.top_bar')
                <div class="px-4 page-body-content">
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{asset('libraries/select2/select2.min.js')}}"></script>
        <script src="{{asset('js/admin.js')}}"></script>
        @livewireScripts
        @stack('js')
        <script>
            window.livewire_app_url="{{url('/')}}";
        </script>
    </body>
</html>