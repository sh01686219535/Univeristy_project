@extends('frontend.home.master')
@section('content')
    {{-- Register Form --}}
    <div class="register-container">
        <h2>Create Your Account</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.register.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Full Name" placeholder="Enter Your Name" required>
            <input type="email" name="email" placeholder="Email address" placeholder="Enter Your Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="{{ route('user.login') }}">Login</a></p>
    </div>
@endsection
