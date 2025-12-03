@extends('frontend.home.master')
@section('content')
    @include('frontend.include.slider')
    {{-- @include('frontend.include.hero') --}}
    <section class="advertisement-top">
        <div class="col-md-12">
            <div class="row">
                <div class="advertisement-top">
                    <div class="advetisement-section-top">
                        <div class="advertisement-top-img">
                            @if (isset($advertisementTop->image))
                                <img src="{{ asset($advertisementTop->image ?? '') }}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="properties">
        <div class="col-md-12">
            <div class="row">
                <div class="properties-search col-md-3">
                    <div class="card"
                        style="background:lightgray;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-head">
                            <h3 class="m-3 text-center">Find Your Dream Home</h3>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form action="{{ route('home') }}" method="GET">
                                    <div class="form-group">
                                        <label for="title"><b>Search Keyword</b></label>
                                        <input type="text" id="title" name="title" placeholder="Search text"
                                            class="my-2 form-control">
                                    </div>
                                    <div class="from-group">
                                        <label for="division"><b>Select Division</b></label>
                                        <select name="division" style="" class="form-control my-2">
                                            <option value="">Select Division</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Sylhet">Sylhet</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="barishal">Barisal</option>
                                            <option value="Rangpur">Rangpur</option>
                                        </select>
                                    </div>
                                    <div class="from-group">
                                        <label for="category"><b>Select Category</b></label>
                                        <select name="category" style="" class="form-control my-2">
                                            <option value="">Select Category</option>
                                            @foreach ($category as $data)
                                                <option value="{{ $data->id }}">{{ $data->category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="from-group">
                                        <label for="size"><b>Size (Sqft)</b></label>
                                        <div class="d-flex justify-content-center gap-2 my-3">
                                            <input type="number" class="form-control w-50" name="min_size"
                                                placeholder="Min">
                                            <input type="number" class="form-control w-50" name="max_size"
                                                placeholder="Max">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bed"><b>Min No. of Bed</b></label>
                                        <input type="text" id="bed" name="bed" placeholder="Number of Bed"
                                            class="my-2 form-control">
                                    </div>
                                    <div class="from-group">
                                        <label for="price"><b>Price</b></label>
                                        <div class="d-flex justify-content-center gap-2 my-3">
                                            <input type="number" class="form-control w-50" name="min_price"
                                                placeholder="Min Price">
                                            <input type="number" class="form-control w-50" name="max_price"
                                                placeholder="Max Price">
                                        </div>
                                    </div>
                                    <button class="btn btn-success fs-4">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="advetisement-section-middle">
                        <div class="advertisement-img">
                            @if (isset($advertisementMiddle->image))
                                <img src="{{ asset($advertisementMiddle->image) }}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="properties-box col-md-9 border"
                    style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <h2>Featured Properties</h2>
                    <hr>
                    <div class="property-grid">
                        @foreach ($property as $key => $data)
                            <div class="property-card">
                                <img src="{{ asset($data->image) }}" alt="House">
                                <h3>{{ $data->price }} Taka</h3>
                                <p style="margin-bottom: 0px">Location:- {{ Str::limit($data->location, 20) }}</p>
                                <p style="margin-bottom: 10px"><i class="fas fa-bed"></i> Bedroom:- {{ $data->bedroom }}</p>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#propertyModal{{ $key }}">Quick
                                    view</a>
                                <a href="{{ route('property.details', $data->id) }}">Book now</a>
                            </div>

                            <!-- Modal (Unique per property) -->
                            <div class="modal fade" id="propertyModal{{ $key }}" tabindex="-1"
                                aria-labelledby="modalLabel{{ $key }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $key }}">Property Booking
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <!-- Left: Property Info -->
                                                <div class="col-md-6 border-end">
                                                    <h4>Property Details</h4>
                                                    <img src="{{ asset($data->image) }}" class="img-fluid mb-3"
                                                        alt="House"
                                                        style="width: 100% !important;height:200px !important">
                                                    <p><strong>Location:</strong> {{ $data->location }}</p>
                                                    <p><strong>Price:</strong> {{ $data->price }} Taka</p>
                                                    <p><strong>Bedrooms:</strong> {{ $data->bedroom }}</p>
                                                    <p><strong>Bathrooms:</strong> {{ $data->bathroom ?? 'N/A' }}</p>
                                                    <p><strong>Description:</strong>
                                                        {{ $data->description ?? 'No description available.' }}</p>
                                                </div>

                                                <!-- Right: Contact Form -->
                                                <div class="col-md-6">
                                                    {{-- validation --}}
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    {{-- validation --}}
                                                    <h4>Contact Information</h4>
                                                    <form action="{{ route('frontend.order', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Full Name</label>
                                                            <input type="text" name="name" class="form-control"
                                                                id="name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Phone
                                                                Number</label>
                                                            <input type="number" name="phone" class="form-control"
                                                                id="phone" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email
                                                                Address</label>
                                                            <input type="email" name="email" class="form-control"
                                                                id="email">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message" class="form-label">Your
                                                                Message</label>
                                                            <textarea name="message" id="message}" rows="3" class="form-control"
                                                                placeholder="I am interested in this property..."></textarea>
                                                        </div>
                                                        @if (Auth::guard('user')->check())
                                                            <button type="submit" class="btn btn-success">Send Booking
                                                                Request</button>
                                                        @else
                                                            <a href="{{ route('user.login') }}"
                                                                class="btn btn-primary w-100">
                                                                Please Login to Book This Property
                                                            </a>
                                                        @endif

                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="advertisement-bottom">
                <div class="advetisement-section-bottom">
                    <div class="advertisement-bottom-img">
                        @if (isset($advertisementBottom->image))
                            <img src="{{ asset($advertisementBottom->image ?? '') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
    @include('frontend.include.testimonial')
@endsection
