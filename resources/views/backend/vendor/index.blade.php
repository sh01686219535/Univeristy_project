@extends('backend.admin.master')
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
                                <h2 class="text-center">Vendor Deatils</h2>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Si</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($vendor as $data)
                                            <tr>
                                                <td>#{{ $i++ }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>
                                                    @if ($data->status == 'approved')
                                                        <button class="btn btn-success">Approved</button>
                                                    @elseif ($data->status == 'pending')
                                                    <a href="{{route('vendor.approve',$data->id)}}" class="btn btn-danger">Pending</a>
                                                    @endif
                                                  
                                                </td>
                                                <td class="d-flex">
                                                    <form class="badge" action="{{route('vendor.delete',$data->id)}}" method="post">
                                                        @csrf
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
