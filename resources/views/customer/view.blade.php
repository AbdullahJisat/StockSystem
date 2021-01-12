@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Customer</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('customer.add') }}"> Create New Student</a>
        </div>
    </div>
</div>
@if(session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @php ($i = 1)
        @foreach ($all as $customer)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->image }}</td>
                <td>
                    <a title="Edit" class="btn btn-primary" href="{{ route('customer.add',$customer->id) }}"></a>||
                    
                    
                    <a title="Delete" class="btn btn-primary" href="{{ route('customer.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $customer->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection