@extends('frontend.home.master')

@section('content')
<div class="row">
    <div class="main-div col-md-12 d-flex">

        {{-- Login Form --}}
        <div class="col-md-6">
            <div class="login-container">
                <h2>Vendor Login to Basabari</h2>

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->loginErrors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->loginErrors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('vendor.login.store') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Email address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>

        {{-- Register Form --}}
        <div class="col-md-6">
            <div class="register-container">
                <h2>Vendor Create Your Account</h2>

                {{-- Validation Errors --}}
                @if ($errors->registerErrors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->registerErrors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('vendor.register.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
