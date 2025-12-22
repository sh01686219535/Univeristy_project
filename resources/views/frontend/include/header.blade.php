    {{-- <header class="header">
        <a href="{{url('/')}}" style="text-decoration: none"> --}}
    {{-- <div class="logo" >🏠 BASABARI</div> --}}
    {{-- <img src="{{asset('frontendAsset')}}/images/logo.png" width="200" height="60">
        </a>
        <nav class="nav-links">
            <a href="{{url('/')}}">Home</a>
            <a href="{{route('listing')}}">Listings</a>
            <a href="{{route('contact')}}">Contact</a>
            <a href="{{route('how.to.work')}}">How To Work</a>
            <a href="{{route('frontend.login')}}">Login</a>
            <a href="{{route('frontend.register')}}">Register</a>
        </nav>
    </header> --}}
    @php
        use Illuminate\Support\Facades\Auth;
    @endphp

    <header class="header">
        <a href="{{ url('/') }}" style="text-decoration: none">
            <img src="{{ asset('frontendAsset/images/logo.png') }}" width="200" height="60">
        </a>

        <nav class="nav-links">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('listing') }}">Listings</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('how.to.work') }}">How To Work</a>

            @if (Auth::guard('user')->check())
                {{-- User is logged in --}}
                <a style="margin-right: 10px; color: #000;">
                    <strong>{{ Auth::guard('user')->user()->name }}</strong>
                </a>
            @elseif (Auth::guard('vendor')->check())
                <a style="margin-right: 10px; color: #000;">
                    <strong>{{ Auth::guard('vendor')->user()->name }}</strong>
                </a>
            @else
                {{-- Not logged in --}}
                {{-- <a href="{{ route('user.view') }}">Login-Or-Register</a> --}}
                {{-- <a href="{{ route('user.login') }}">Login</a> --}}
                {{-- <a href="{{ route('user.register') }}">Register</a> --}}
                {{-- <a href="{{ route('vendor.view') }}">Vendor</a> --}}
                <a href="{{ route('user.view') }}" class="auth-btn">
                    Login / Register
                </a>
                <a href="{{ route('vendor.view') }}" class="auth-btn vendor">
                    Vendor
                </a>
            @endif


        </nav>
    </header>
