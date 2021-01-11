@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('category.add') }}"> Create New Student</a>
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
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @php ($i = 1)
        @foreach ($all as $category)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a title="Edit" class="btn btn-primary" href="{{ route('category.add',$category->id) }}"></a>||
                    
                    
                    <a title="Delete" class="btn btn-primary" href="{{ route('category.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $category->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection