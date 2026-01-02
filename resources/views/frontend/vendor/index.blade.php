@extends('frontend.home.master')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-md-6">

            {{-- Login Form --}}
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Vendor Login to Basabari</h2>

                    {{-- Validation Errors for Login --}}
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

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password"
                                required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Login</button>
                    </form>

                    <div class="text-center mt-3">
                        <p class="mb-1">- OR -</p>
                        <a class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#myModal">
                            Create a Vendor Account
                        </a>
                    </div>

                </div>
            </div>
        </div>

        {{-- Register Modal --}}
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Vendor Create Your Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('vendor.register.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            {{-- Register Errors --}}
                            @if ($errors->registerErrors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->registerErrors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email address"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm Password" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection

{{-- Register Form --}}
{{-- <div class="col-md-6">
                <div class="register-container">
                    <h2>Vendor Create Your Account</h2>

          
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
            </div> --}}




{{-- @extends('frontend.home.master')

@section('content')
    <div class="row">
        <div class="main-div col-md-12 d-flex">

        
            <div class="col-md-12">
                <div class="login-container">
                    <h2>Vendor Login to Basabari</h2>

             
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                
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
                    <div class="social-auth-links text-center">
                        <p>- OR -</p>
                        <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-block btn-primary text-white">
                            I already have a membership
                        </a>
                    </div>
                </div>
            </div>
          
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Vendor Create Your Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('vendor.register.store') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <input type="text" name="name" placeholder="Full Name" class="from-control" required>
                                <input type="email" name="email" placeholder="Email address" required>
                                <input type="password" name="password" placeholder="Password" required>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

           

        </div>
    </div>
@endsection  --}}
