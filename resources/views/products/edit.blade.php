@extends('layouts.app-master')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Product</h2>
        </div>
        <div class="card-body">
            <form action="{{ route("products.update", [$product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                    <label for="name">Name*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($product) ? $product->name : '') }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span> 
                    @endif
                </div>
                <div class="form-group mt-3">
                    <label for="">Description*</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($product) ? $product->description : '') }}">
                    @if($errors->has('description'))
                        <span class="text-danger">{{$errors->first('description')}}</span> 
                    @endif
                </div>
                <div class="form-group mt-3">
                    <label for="">Price*</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}">
                    @if($errors->has('price'))
                        <span class="text-danger">{{$errors->first('price')}}</span> 
                    @endif
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-md btn-warning">update</button>
                </div>
            </form>
        </div>
     
    </div>
</div>
@endsection