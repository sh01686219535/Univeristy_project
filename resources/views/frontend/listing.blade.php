@extends('frontend.home.master')
@section('content')
   <section class="properties">
        <h2>Featured Properties</h2>
        <div class="property-grid">
            @foreach ($property as $key => $data)
                <div class="property-card">
                    <img src="{{ asset($data->image) }}" alt="House">
                    <h3>{{ $data->price }} Taka</h3>
                    <p style="margin-bottom: 0px">Location:- {{ Str::limit($data->location, 20) }}</p>
                    <p style="margin-bottom: 10px"><i class="fas fa-bed"></i> Bedroom:- {{ $data->bedroom }}</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#propertyModal{{ $key }}">Book now</a>
                </div>

                <!-- Modal (Unique per property) -->
                <div class="modal fade" id="propertyModal{{ $key }}" tabindex="-1"
                    aria-labelledby="modalLabel{{ $key }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $key }}">Property Booking</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Left: Property Info -->
                                    <div class="col-md-6 border-end">
                                        <h4>Property Details</h4>
                                        <img src="{{ asset($data->image) }}" class="img-fluid mb-3" alt="House"
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
                                        <h4>Contact Information</h4>
                                        <form action="{{ route('order') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Full Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone
                                                    Number</label>
                                                <input type="text" name="phone" class="form-control" id="phone"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email
                                                    Address</label>
                                                <input type="email" name="email" class="form-control" id="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message" class="form-label">Your
                                                    Message</label>
                                                <textarea name="message" id="message}" rows="3" class="form-control"
                                                    placeholder="I am interested in this property..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success">Send Booking Request</button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection