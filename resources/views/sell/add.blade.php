@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>
                @if(@isset($editData))
                Edit Sell
                @else
                Add New Sell
                @endif  
            </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ (@$editData)?route('sell.update',$editData->id):route('sell.store') }}"> Back</a>
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
	<form class="" method="POST" action="{{ route('sell.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="category" class="">{{_('Category')}}</label>
                <select name="category_id" class="">
                    <option value="">select</option>
                    @foreach ($cat as $category)
                    <option value="{{ $category->id }}" {{ (@$editData->
                    category_id==$category->id)?"selected":"" }}>{{ $category->name }}</option>  
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="customer" class="">{{_('customer')}}</label>
                <select name="customer_id" class="">
                    <option value="">select</option>
                    @foreach ($cus as $customer)
                    <option value="{{ $customer->id }}" {{ (@$editData->
                    category_id==$customer->id)?"selected":"" }}>{{ $customer->email }}</option>  
                    @endforeach
                </select>
            </div>
        </div>
        <?php $prod = $pro ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="category" class="">{{_('Category')}}</label>
                <select name="pro_id" id="pro_id" onchange="setPrice(this.value, {{$pro}})" class="">
                    <option value="">select</option>
                    @foreach ($pro as $pro)
                    <option value="{{ $pro->id }}" {{ (@$editData->category_id==$pro->id)?"selected":"" }}>{{ $pro->name }}</option>  
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="price" class="">{{_('Price')}}</label>
                <input type="number" id="price" disabled name="price" value="{{ @$editData->price }}" class="form-control" placeholder="price">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
        </div>
    </div>
</form>
<script>
    function setPrice(id, p) {

        console.log(p);
        $.each(p, function(i, row){
            console.log(row.price);
            if (row.id == id) {
                $('#price').val(row.price);
                return false;
            }
            else
                $('#price').val('');

        });
    }
</script>
@endsection