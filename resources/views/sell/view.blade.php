@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('sell.add') }}"> Create New Student</a>
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
            <th>Category</th>
            <th>Customer</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @php ($i = 1)
        @foreach ($all as $sell)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $sell['category']['name'] }}</td>
                <td>{{ $sell['customer']['email'] }}</td>
                <td>
                    <a title="Edit" class="btn btn-primary" href="{{ route('product.add',$product->id) }}"></a>||
                    
                    
                    <a title="Delete" class="btn btn-primary" href="{{ route('product.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $product->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection