@extends('user.home.master')
@section('title')
    Order
@endsection
@section('content')
    <div class="content-wrapper ">
        <section class="content ">
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="float-left font-weight-bold inline-block">Order Update Form</h3>
                                <a href="{{ route('user.order') }}" class="float-right btn btn-primary">Order</a>
                            </div>
                            <div class="col-md-8 m-auto">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <form action="{{ route('user.order.update', $order->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Enter Your Name" value="{{ $order->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" name="phone" class="form-control" id="phone"
                                                placeholder="Enter Your Phone" value="{{ $order->phone }}">
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="Enter Email Address" value="{{ $order->email }}">
                                        </div>
                                        <div class="mb-3">
                                            {{-- <select name="status" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="approved"
                                                    {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }}>
                                                    Canceled</option>
                                                <option value="pending" {{ $order->status == '' ? 'selected' : '' }}>
                                                    Pending</option>
                                            </select> --}}
                                            <div class="mb-3">
                                                <textarea name="message" id="message" rows="3" class="form-control" placeholder="Please Type Your Message">{{ $order->message }}</textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
