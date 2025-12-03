@extends('frontend.home.master')

@section('content')
    <section class="contact-section">
        <div class="container-property">
            <div class="col-md-12">
                <div class="row">
                    {{-- Left Section: Property Details --}}
                    <div class="col-md-8">
                        <div class="property-details">
                            <div class="card">
                                <div class="card-head">
                                    <h3 class="m-3 text-center">{{ $property->title ?? 'Title' }}</h3>
                                </div>
                                <div class="card-body">
                                    @php
                                        $images = json_decode($property->multi_image, true) ?? [];
                                    @endphp

                                    @if (count($images) > 0)
                                        <div class="text-center">
                                            {{-- Main Image Display --}}
                                            <div class="mb-3">
                                                <img id="mainImage" src="{{ asset($images[0]) }}" alt="Main Property Image"
                                                    class="img-fluid rounded shadow"
                                                    style="max-height: 530px; object-fit: cover;">
                                            </div>

                                            {{-- Thumbnails --}}
                                            <div class="d-flex justify-content-center flex-wrap gap-2">
                                                @foreach ($images as $index => $image)
                                                    <img src="{{ asset($image) }}" alt="Thumbnail {{ $index + 1 }}"
                                                        class="img-thumbnail thumb-img cursor-pointer"
                                                        style="width: 115px; height: 100px; object-fit: cover;"
                                                        onclick="changeMainImage('{{ asset($image) }}', this)">
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Right Section: Property Owner --}}
                    <div class="col-md-4">
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
                        <div class="property-owner">
                            <div class="card">
                                <div class="card-head">
                                    <h3 class="m-3 text-center">Property Owner Details</h3>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="{{ asset($property->image ??'frontendAsset/images/property_owner.jpg') }}"
                                            alt="property image" class="d-block mx-auto cursor-pointer rounded-1" width="100" height="100">
                                    </div>
                                    <h3 class="fw-bold text-center my-2">{{ $property->phone ?? '01910-000000' }}</h3>
                                    <h4 class="mt-3 text-center">Send Message to Property Owner</h4>

                                    <form action="{{ route('frontend.order', $property->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Enter Your Name">
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" name="phone" class="form-control" id="phone"
                                                placeholder="Enter Your Phone">
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="Enter Email Address">
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="message" id="message" rows="3" class="form-control" placeholder="Please Type Your Message"></textarea>
                                        </div>
                                        @if (Auth::guard('user')->check())
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button type="submit" class="btn btn-success d-block mx-auto">
                                                    Send Booking Request
                                                </button>
                                            @else
                                                <a href="{{ route('user.login') }}" class="btn btn-primary w-100">
                                                    Please Login to Book This Property
                                                </a>
                                        @endif

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div> {{-- row --}}
        </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        function changeMainImage(src, element) {
            const mainImg = document.getElementById('mainImage');
            mainImg.src = src;
            document.querySelectorAll('.thumb-img').forEach(img => img.classList.remove('active'));
            element.classList.add('active');
        }
    </script>
@endpush
