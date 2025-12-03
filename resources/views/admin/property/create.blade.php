@extends('admin.home.master')
@section('title')
    Property Create
@endsection
@section('content')
    <div class="content-wrapper ">
        <section class="content ">
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="float-left font-weight-bold inline-block">Property Create Form</h3>
                                <a href="{{ route('admin_property.index') }}" class="float-right btn btn-primary">Property</a>
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
                                    <form action="{{ route('admin_property.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="group-top">
                                            <div class="form-group">
                                                <label for="title">Property Title</label>
                                                <input type="text" id="title"
                                                    class="form-control @error('title') is-invalid  @enderror"
                                                    placeholder="Enter Property Title" name="title"
                                                    value="{{ old('title') }}">
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="category_id">Property Category</label>
                                                <select id="category_id" name="category_id"
                                                    class="form-control @error('category_id') is-invalid @enderror">
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ old('category_id', $property->category_id ?? '') == $data->id ? 'selected' : '' }}>
                                                            {{ $data->category }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="size">Property Size</label>
                                                <input type="text" id="size"
                                                    class="form-control @error('size') is-invalid  @enderror"
                                                    placeholder="Enter Property size" name="size"
                                                    value="{{ old('size') }}">
                                                @error('size')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" id="price"
                                                    class="form-control @error('price') is-invalid  @enderror"
                                                    placeholder="Enter Price" name="price" value="{{ old('price') }}">
                                                @error('price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bedroom">Bedroom</label>
                                                        <input type="text" id="bedroom"
                                                            class="form-control @error('bedroom') is-invalid
                                                    @enderror"
                                                            name="bedroom" placeholder="Enter Bedroom"
                                                            value="{{ old('bedroom') }}">
                                                        @error('bedroom')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bathroom">Bathroom</label>
                                                        <input type="text" id="bathroom"
                                                            class="form-control @error('bathroom') is-invalid @enderror"
                                                            name="bathroom" placeholder="Enter Bathroom"
                                                            value="{{ old('bathroom') }}">
                                                        @error('bathroom')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="group-bottom">
                                            <div class="form-group">
                                                <label for="division">Division</label>
                                                <select name="division" id="division"
                                                    class="form-control @error('division') is-invalid @enderror">
                                                    <option value="">Select Division</option>
                                                    <option value="dhaka"
                                                        {{ old('division') == 'dhaka' ? 'selected' : '' }}>
                                                        Dhaka</option>
                                                    <option value="chittagong"
                                                        {{ old('division') == 'chittagong' ? 'selected' : '' }}>Chittagong
                                                    </option>
                                                    <option value="khulna"
                                                        {{ old('division') == 'khulna' ? 'selected' : '' }}>
                                                        Khulna</option>
                                                    <option value="rajshahi"
                                                        {{ old('division') == 'rajshahi' ? 'selected' : '' }}>Rajshahi
                                                    </option>
                                                    <option value="rangpur"
                                                        {{ old('division') == 'rangpur' ? 'selected' : '' }}>Rangpur
                                                    </option>
                                                    <option value="Mymensingh"
                                                        {{ old('division') == 'Mymensingh' ? 'selected' : '' }}>Mymensingh
                                                    </option>
                                                    <option value="sylhet"
                                                        {{ old('division') == 'sylhet' ? 'selected' : '' }}>
                                                        Sylhet </option>
                                                    <option value="barishal"
                                                        {{ old('division') == 'barishal' ? 'selected' : '' }}>Barishal
                                                    </option>
                                                </select>
                                                @error('division')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" id="location"
                                                    class="form-control @error('location') is-invalid @enderror"
                                                    name="location" placeholder="Enter Location"
                                                    value="{{ old('location') }}">
                                                @error('location')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                                    placeholder="Enter Some Description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="image">image</label>
                                                <input type="file" id="image" class="form-control"
                                                    name="image">
                                            </div>
                                            <div class="form-group">
                                                <label for="multi_image">Multiple Image</label>
                                                <input type="file" id="multi_image" class="form-control"
                                                    name="multi_image[]" multiple>
                                            </div>
                                        </div>
                                        <br>
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
