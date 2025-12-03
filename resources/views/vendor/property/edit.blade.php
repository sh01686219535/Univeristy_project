@extends('vendor.home.master')
@section('title')
    Property
@endsection
@section('content')
    <div class="content-wrapper ">
        <section class="content ">
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="float-left font-weight-bold inline-block">Property Update Form</h3>
                                <a href="{{ route('property.index') }}" class="float-right btn btn-primary">Property</a>
                            </div>
                            <div class="col-md-8 m-auto">
                                <div class="card-body">
                                    <form action="{{ route('property.update', $property->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="group-top">
                                             <div class="form-group">
                                            <label for="title">Property Title</label>
                                            <input type="text" id="title" class="form-control"
                                                value="{{ $property->title }}" placeholder="Enter Property Title" name="title"
                                                required>
                                        </div>
                                            <div class="form-group mb-3">
                                                <label for="category_id">Property Category</label>
                                                <select 
                                                    id="category_id" 
                                                    name="category_id"
                                                    class="form-control @error('category_id') is-invalid @enderror"
                                                    required >
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $data)
                                                        <option 
                                                            value="{{ $data->id }}"
                                                            {{ old('category_id', $property->category_id ?? '') == $data->id ? 'selected' : '' }}
                                                        >
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
                                                    value="{{ old('size',  $property->price) }}">
                                                @error('size')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" id="price" class="form-control"
                                                value="{{ $property->price }}" placeholder="Enter Price" name="price"
                                                required>
                                        </div>
                                        <div class="col-md-12 d-flex">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bedroom">Bedroom</label>
                                                    <input type="text" id="bedroom" value="{{ $property->bedroom }}"
                                                        class="form-control" name="bedroom" placeholder="Enter Bedroom"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bathroom">Bathroom</label>
                                                    <input type="text" id="bathroom" value="{{ $property->bathroom }}"
                                                        class="form-control" name="bathroom" placeholder="Enter Bathroom"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <hr>
                                        <div class="group-bottom">
                                               <div class="form-group">
                                            <label for="division">Division</label>
                                            <select name="division" id="division" class="form-control" required>
                                                <option value="">Select Division</option>
                                                <option value="dhaka"
                                                    {{ $property->division == 'dhaka' ? 'selected' : '' }}>Dhaka</option>
                                                <option value="chittagong"
                                                    {{ $property->division == 'chittagong' ? 'selected' : '' }}>Chittagong
                                                </option>
                                                <option value="khulna"
                                                    {{ $property->division == 'khulna' ? 'selected' : '' }}>Khulna</option>
                                                <option value="rajshahi"
                                                    {{ $property->division == 'rajshahi' ? 'selected' : '' }}>Rajshahi
                                                </option>
                                                <option value="rangpur"
                                                    {{ $property->division == 'rangpur' ? 'selected' : '' }}>Rangpur
                                                </option>
                                                <option value="Mymensingh"
                                                    {{ $property->division == 'Mymensingh' ? 'selected' : '' }}>
                                                    Mymenshingh</option>
                                                <option value="sylhet"
                                                    {{ $property->division == 'sylhet' ? 'selected' : '' }}>Sylhet</option>
                                                <option value="barishal"
                                                    {{ $property->division == 'barishal' ? 'selected' : '' }}>Barishal
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" id="location"
                                                class="form-control"value="{{ $property->location }}" name="location"
                                                placeholder="Enter Location" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Enter Some Description">{{ $property->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">image</label>
                                            <input type="file" id="image" class="form-control" name="image">
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
