@extends('backend.admin.master')
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
                                <h3 class="float-left font-weight-bold inline-block">Property Create Form</h3>
                                <a href="{{ route('property.index') }}" class="float-right btn btn-primary">Property</a>
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
                                    <form action="{{ route('property.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" id="price" class="form-control"
                                                placeholder="Enter Price" name="price" required>
                                        </div>
                                        <div class="col-md-12 d-flex">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bedroom">Bedroom</label>
                                                    <input type="text" id="bedroom" class="form-control" name="bedroom"
                                                        placeholder="Enter Bedroom" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bathroom">Bathroom</label>
                                                    <input type="text" id="bathroom" class="form-control"
                                                        name="bathroom" placeholder="Enter Bathroom" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="division">Division</label>
                                            <select name="division" id="division" class="form-control">
                                                <option value="">Select Division</option>
                                                <option value="dhaka">Dhaka</option>
                                                <option value="chittagong">Chittagong</option>
                                                <option value="khulna">Khulna</option>
                                                <option value="rajshahi">Rajshahi</option>
                                                <option value="rangpur">Rangpur</option>
                                                <option value="mymenshingh">Mymenshingh</option>
                                                <option value="sylhet ">Sylhet </option>
                                                <option value="barishal ">Barishal </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" id="location" class="form-control" name="location"
                                                placeholder="Enter Location" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Enter Some Description"></textarea>
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
