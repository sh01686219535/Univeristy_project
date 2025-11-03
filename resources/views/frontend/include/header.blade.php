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

        @if (Auth::check() && Auth::user()->role == 2)
            {{-- Vendor is logged in --}}
            <a style="margin-right: 10px; color: #000;"><strong>{{ Auth::user()->name }}</strong></a>
        @else
            {{-- Not logged in or not a vendor --}}
            <a href="{{ url('vendor/login') }}">Login</a>
            <a href="{{ url('vendor/register') }}">Register</a>
        @endif
    </nav>
</header>
