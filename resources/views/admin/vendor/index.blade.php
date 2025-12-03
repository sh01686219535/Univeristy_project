@extends('admin.home.master')

@section('title')
    Vendor
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <h2 class="text-center">Vendor Details</h2>
                            </div>

                            <div class="card-body">
                                <table id="example" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $i = 1; @endphp

                                        @foreach ($vendor as $data)
                                            <tr>
                                                <td>#{{ $i++ }}</td>

                                                <td>{{ $data->name }}</td>

                                                <td>{{ $data->phone }}</td>

                                                <td>{{ $data->email }}</td>

                                                <td>
                                                    <img src="{{ asset($data->image) }}" 
                                                         width="50" height="50" alt="Vendor Image">
                                                </td>

                                                <td>
                                                    @if ($data->status == 0)
                                                        <span class="badge bg-warning text-dark px-3 py-2">
                                                            Pending
                                                        </span>
                                                    @elseif ($data->status == 1)
                                                        <span class="badge bg-success px-3 py-2">
                                                            Approved
                                                        </span>
                                                    @else
                                                        <span class="badge bg-danger px-3 py-2">
                                                            Canceled
                                                        </span>
                                                    @endif
                                                </td>

                                                <td class="d-flex">
                                                    <form action="{{ route('vendor.delete', $data->id) }}" 
                                                          method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this vendor?')">
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
