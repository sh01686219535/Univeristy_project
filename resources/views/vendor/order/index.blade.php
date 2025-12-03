@extends('vendor.home.master')
@section('title')
    Order
@endsection
@section('content')
    <div class="content-wrapper ">
        <section class="content ">
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center">Order Deatils</h2>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Si</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Property</th>
                                            <th>Approve</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($order as $data)
                                            <tr>
                                                <td>#{{ $i++ }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->phone }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ Str::limit($data->message, 20) }}</td>
                                                <td><a href="{{ route('order.property', $data->id) }}"
                                                        class="btn btn-info"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></a></td>
                                                <td class="text-center">
                                                    @if ($data->status === 'approved')
                                                        <span class="badge bg-success px-3 py-2">
                                                            <i class="fas fa-check-circle"></i> Approved
                                                        </span>
                                                    @elseif ($data->status === 'cancel')
                                                        <span class="badge bg-danger px-3 py-2">
                                                            <i class="fas fa-times-circle"></i> Canceled
                                                        </span>
                                                    @else
                                                        <a href="{{ route('order.approve', $data->id) }}"
                                                            class="btn btn-success btn-sm me-2">
                                                            <i class="fas fa-check-circle"></i> Approve
                                                        </a>
                                                        <a href="{{ route('order.cancel', $data->id) }}"
                                                            class="btn btn-danger btn-sm">
                                                            <i class="fas fa-times-circle"></i> Cancel
                                                        </a>
                                                    @endif
                                                </td>


                                                <td class="d-flex">
                                                      <a href="{{ route('order.edit', $data->id) }}"
                                                            class="btn btn-info">
                                                            <i class="fa-solid fa-edit"></i>
                                                        </a>
                                                    {{-- <form class="badge" action="{{ route('order.delete', $data->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-danger " type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this?')">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form> --}}
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
