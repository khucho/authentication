@extends('layouts.app-master')
@section('content')
@can('isAdmin')
    <div style="margin-bottom: 10px;" class="row mt-3">
        <div class="col-lg-12">
            <button class="btn btn-primary" id="btn_add" data-bs-target="#form_modal" data-bs-toggle="modal">Add Product</button>
        
        </div>
    </div>
    <div class="modal" id="form_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add Product</h2>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        
                        <div class="form-group mt-3">
                            <label for="name">Name*</label>
                            <input type="text" id="name" name="name" class="form-control" >
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span> 
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Description*</label>
                            <input type="text" id="description" name="description" class="form-control">
                            @if($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span> 
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Price*</label>
                            <input type="text" id="price" name="price" class="form-control">
                            @if($errors->has('price'))
                                <span class="text-danger">{{$errors->first('price')}}</span> 
                            @endif
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-md btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@elsecan('isManager')
    <div style="margin-bottom: 10px;" class="row mt-3">
        <div class="col-lg-12">
            <button class="btn btn-primary" id="btn_add" data-bs-target="#form_modal" data-bs-toggle="modal">Add Product</button>
        
        </div>
    </div>
    <div class="modal" id="form_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add Product</h2>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        
                        <div class="form-group mt-3">
                            <label for="name">Name*</label>
                            <input type="text" id="name" name="name" class="form-control" >
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span> 
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Description*</label>
                            <input type="text" id="description" name="description" class="form-control">
                            @if($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span> 
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Price*</label>
                            <input type="text" id="price" name="price" class="form-control">
                            @if($errors->has('price'))
                                <span class="text-danger">{{$errors->first('price')}}</span> 
                            @endif
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-md btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcan

<div class="container">
    <div class="row">
        <table class=" table table-striped">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                       ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td>

                        </td>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $product->name }}
                        
                        </td>
                            
                        <td>
                            {{ $product->description }}
                            
                        </td>
                        <td>
                            {{ $product->price }}
                            
                        </td>
                        @can('isAdmin')
                            <td>
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('products.destroy',$product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td> 
                        @elsecan('isManager') 
                            <td>
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-success">Edit</a>
                            </td>
                        @endcan
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




  
@endsection