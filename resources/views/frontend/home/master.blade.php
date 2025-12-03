@include('frontend.include.style')

<body>
    
    @include('frontend.include.header')
    @yield('content')
    @include('frontend.include.footer')
    @include('frontend.include.script')

