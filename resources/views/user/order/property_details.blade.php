@extends('user.home.master')

@section('title', 'Property Details')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container my-5">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Property Image --}}
                    <div class="col-md-5">
                        <img src="{{ asset($property->image) }}" 
                             alt="{{ $property->title }}" 
                             class="img-fluid w-100 h-100 object-fit-cover">
                    </div>

                    {{-- Property Details --}}
                    <div class="col-md-7 bg-light">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="fw-bold text-primary mb-0">{{ $property->title }}</h3>
                                <a href="{{ route('user.order') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-arrow-left"></i> Back to Orders
                                </a>
                            </div>

                            <p class="text-muted mb-1">
                                <strong>Category:</strong>
                                {{ $categories->where('id', $property->category_id)->first()->category ?? 'N/A' }}
                            </p>

                            <hr>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <p><strong>Price:</strong> {{ number_format($property->price) }} Taka</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <p><strong>Size:</strong> {{ $property->size ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <p><strong>Bedroom:</strong> {{ $property->bedroom }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <p><strong>Bathroom:</strong> {{ $property->bathroom }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <p><strong>Division:</strong> {{ ucfirst($property->division) }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <p><strong>Location:</strong> {{ $property->location }}</p>
                                </div>
                            </div>

                            <hr>

                            <div>
                                <h5 class="fw-bold text-secondary mb-2">Description</h5>
                                <p class="text-dark">{{ $property->description ?? 'No description available.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
    .object-fit-cover {
        object-fit: cover;
        height: 100%;
    }
    .card-body p {
        font-size: 15px;
    }
</style>
@endpush
