@extends('admin.home.master')
@section('title')
    Advertisement
@endsection
@section('content')
    <div class="content-wrapper ">
        <section class="content ">
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="float-left font-weight-bold inline-block">Advertisement Create Form</h3>
                                <a href="{{ route('admin_advertisement.index') }}" class="float-right btn btn-primary">Category</a>
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
                                    <form action="{{ route('admin_advertisement.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="place">Advertisement Place</label>
                                            <select name="place" id="place"
                                                class="form-control @error('place') is-invalid @enderror">
                                                <option value="">Select Place</option>
                                                <option value="top" {{ old('place') == 'top' ? 'selected' : '' }}>
                                                    Top</option>
                                                <option value="middle" {{ old('place') == 'middle' ? 'selected' : '' }}>
                                                    Middle</option>
                                                <option value="bottom" {{ old('place') == 'bottom' ? 'selected' : '' }}>
                                                    Bottom
                                                </option>

                                            </select>
                                            @error('place')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Advertisement Place Price</label>
                                            <input type="text" id="price"
                                                class="form-control @error('price') is-invalid  @enderror"
                                                placeholder="Enter Advertisement Place Price" name="price"
                                                value="{{ old('price') }}" disabled>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image">image</label>
                                            <input type="file" id="image" class="form-control" name="image">
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
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const placeSelect = document.getElementById('place');
            const priceInput = document.getElementById('price');

            // Define prices for each place
            const placePrices = {
                top: 20,
                middle: 30,
                bottom: 15
            };

            // Update price when place changes
            placeSelect.addEventListener('change', function() {
                const selected = placeSelect.value;
                if (placePrices[selected] !== undefined) {
                    priceInput.value = placePrices[selected];
                } else {
                    priceInput.value = ''; // reset if nothing selected
                }
            });

            // Trigger change on page load if old value exists
            if (placeSelect.value) {
                const evt = new Event('change');
                placeSelect.dispatchEvent(evt);
            }
        });
    </script>
@endpush
