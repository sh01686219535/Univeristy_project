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
                            @php
                                $vendorId = Auth::guard('vendor')->id();
                                $propertyCount = \App\Models\Admin\Property::where('vendor_id', $vendorId)->count();
                            @endphp
                            <div class="card-header">
                                @if ($propertyCount < 5)
                                    <a href="{{ route('property.create') }}" class="btn btn-primary">Create</a>
                                 @else
                                <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary">Create</a>
                                @endif
                            </div>
                            <!-- Pricing Plan Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Choose Property Posting Plan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <!-- Free Plan -->
                                                <div class="col-md-4">
                                                    <div class="card shadow">
                                                        <div class="card-header bg-success text-white text-center">
                                                            <h4>Free Plan</h4>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <h2>0৳</h2>
                                                            <p>First 5 properties are free.</p>

                                                            @if ($propertyCount < 5)
                                                                <a href="{{ route('property.create') }}"
                                                                    class="btn btn-success w-100">
                                                                    Continue Free
                                                                </a>
                                                            @else
                                                                <button class="btn btn-secondary w-100" disabled>Limit
                                                                    Reached</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- 100 Taka Plan -->
                                                <div class="col-md-4">
                                                    <div class="card shadow">
                                                        <div class="card-header bg-info text-white text-center">
                                                            <h4>10 Property Plan</h4>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <h2>100৳</h2>
                                                            <p>Post next 10 properties</p>

                                                            @if ($propertyCount >= 5 && $propertyCount < 15)
                                                                <a href="#" class="btn btn-info w-100">Buy Now</a>
                                                            @else
                                                                <button class="btn btn-secondary w-100" disabled>Not
                                                                    Available</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- 200 Taka Plan -->
                                                <div class="col-md-4">
                                                    <div class="card shadow">
                                                        <div class="card-header bg-warning text-dark text-center">
                                                            <h4>50 Property Plan</h4>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <h2>200৳</h2>
                                                            <p>Post next 50 properties</p>

                                                            @if ($propertyCount >= 15 && $propertyCount < 65)
                                                                <a href="#" class="btn btn-warning w-100">Buy Now</a>
                                                            @else
                                                                <button class="btn btn-secondary w-100" disabled>Not
                                                                    Available</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Si</th>
                                            <th>Price</th>
                                            <th>Bedroom</th>
                                            <th>Bathroom</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($property as $data)
                                            <tr>
                                                <td>#{{ $i++ }}</td>
                                                <td>{{ $data->price }}</td>
                                                <td>{{ $data->bedroom }}</td>
                                                <td>{{ $data->bathroom }}</td>
                                                <td>{{ $data->location }}</td>
                                                <td>{{ Str::limit($data->description, 20) }}</td>
                                                <td>
                                                    <img src="{{ asset($data->image) }}" width="50" height="50"
                                                        alt="">
                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{ route('property.edit', $data->id) }}" class="btn btn-info"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <form class="badge"
                                                        action="{{ route('property.destroy', $data->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger " type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this?')">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
