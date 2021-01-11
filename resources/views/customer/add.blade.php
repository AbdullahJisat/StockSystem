@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>
                @if(@isset($editData))
                Edit Customer
                @else
                Add New Customer
                @endif  
            </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ (@$editData)?route('customer.update',$editData->id):route('customer.store') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
	<form class="" method="POST" action="{{ (@$editData)?route('customer.update',$editData->id):route('Customer.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name" class="">{{_('Name')}}</label>
                <input type="text" name="name" value="{{ @$editData->name }}" class="form-control" placeholder="Name"
                {{-- <font color="red">{{ ($error->has('name'))(@error->first('name')):'' }}</font> --}}
                @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
        </div>
    </div>
</form>
@endsection