@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>
                @if(@isset($editData))
                Edit Product
                @else
                Add New Product
                @endif  
            </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ (@$editData)?route('product.update',$editData->id):route('product.store') }}"> Back</a>
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
	<form class="" method="POST" action="{{ (@$editData)?route('product.update',$editData->id):route('product.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="category" class="">{{_('Category')}}</label>
                <select name="category_id" class="">
                    <option value="">select</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (@$editData->
                    category_id==$category->id)?"selected":"" }}>{{ $category->name }}</option>  
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name" class="">{{_('Name')}}</label>
                <input type="text" name="name" value="{{ @$editData->name }}" class="form-control" placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                {{-- <font color="red">{{ ($error->has('name'))(@error->first('name')):'' }}</font> --}}
                
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="quantity" class="">{{_('Quantity')}}</label>
                <input type="number" name="quantity" value="{{ @$editData->quantity }}" class="form-control" placeholder="Name"
                {{-- <font color="red">{{ ($error->has('name'))(@error->first('name')):'' }}</font> --}}
                @error('quantity') is-invalid @enderror">
                @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="price" class="">{{_('Price')}}</label>
                <input type="number" name="price" value="{{ @$editData->price }}" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="buyprice" class="">{{_('BuyPrice')}}</label>
                <input type="number" name="buyprice" value="{{ @$editData->buy_price }}" class="form-control" placeholder="Name">
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="image" class="">{{_('Image')}}</label>
                <input type="file" name="image" id="iamge" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img id="showImage" src="{{ (!empty($editData->image))?url('public/upload/productImage/'.$editData->image):url('public/upload/no.png/') }}" style="width :150px;height :160px;border:1px solid #0000;">
            </div>
        </div>

       {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="sub_image" class="">{{_('SubImage')}}</label>
                <input type="file" name="sub_image[]" class="form-control" multiple>
            </div>
        </div> --}}

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
        </div>
    </div>
</form>
@endsection