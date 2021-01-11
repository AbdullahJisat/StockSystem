@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('product.add') }}"> Create New Student</a>
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
            <th>Quantity</th>
            <th>name</th>
            <th>price</th>
            <th>buyprice</th>
            <th>image</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @php ($i = 1)
        @foreach ($all as $product)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $product['category']['name'] }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->buy_price }}</td>
                <td><img src=""></td>
                <td>
                    <a title="Edit" class="btn btn-primary" href="{{ route('product.add',$product->id) }}"></a>||
                    
                    
                    <a title="Delete" class="btn btn-primary" href="{{ route('product.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $product->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection