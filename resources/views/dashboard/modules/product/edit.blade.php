@extends('dashboard.layout.app')

{{-- page title --}}
@section('dashboard_page_title', 'Product Edit')

{{-- custom stylesheet --}}
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/dashboard/modules/product.css') }}">
@endsection

{{-- breadcrumb links --}}
@section('dashboard_breadcrumb')
    <li class="breadcrumb-item" aria-current="page">
        <a href="{{ url('/dashboard') }}" class="breadcrumb-link">Dashboard / </a>
    </li>
@endsection

@section('content')
{{-- BEGIN:: Product Edit --}}
<div class="edit-product-content-wrapper">
    <form id="product-form" action="{{ route('product-update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="general-info-wrapper">
            {{-- general information --}}
                <p class="font-weight-bold">General Information</p>
                <hr>
                <div class="form-row"> 
                    {{-- preview product image --}}
                    <div class="form-group col-md-4">
                        <label>Product Image (250 x 300)</label>
                        <div class="product-image-preview-wrapper" style="text-align: center; border: 1px solid rgb(110, 110, 110);">
                            @if ($product->image != null)
                                <img style="width: 150px; height: 200px;" id="product-image-preview" src="{{ asset('storage/'.$product->image) }}" alt="product image">
                            @else
                                <img style="width: 150px; height: 200px;" id="product-image-preview" src="{{ asset('img/product/default-img.png') }}" alt="product image">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-row"> 
                    {{-- product upload image --}}
                    <div class="form-group col-md-4">
                        <div class="product-image-wrapper">
                            <div class="product-image-upload form-control">
                                <input type="file" name="image-file" id="image-file" accept="image/x-png,image/gif,image/jpeg" hidden>
                                <p id="image-name-text"></p>
                                <p id="browse-btn">Browse</p>
                            </div>
                        </div>
                    </div>   
                </div>    
                <div class="form-row">
                    {{-- name --}}
                    <div class="form-group col-md-4">
                        <label for="name">Product Name</label>
                        <input class="form-control" value="{{$product->name}}" type="text" minlength="2" maxlength="20" name="name" id="name" required>
                        <small class="text-warning" data-toggle="tooltip" data-placement="right" title="name accept only alphanumeric and whitspace only" > [ Product Name ? ]</small>
                    </div>
                    {{-- category --}}
                    <div class="form-group col-md-4">
                        <label for="category">Category</label>
                        <select class="custom-select" name="category" id="category" required>
                            <option selected hidden value="{{$product->category->id}}">{{$product->category->name}}</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>                
                </div>
                <div class="form-row">
                    {{-- description --}}
                    <div class="form-group col-md-8">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{$product->description}}</textarea>
                    </div>
                </div>
            {{-- update & cancel button --}}
            <div class="product-btn-wrapper form-row">
                <input type="submit" class="btn btn-sm btn-outline-success mr-2" value="Update Product">
                <a class="btn btn-sm btn-outline-danger" href="{{ route('category-products-list', ['categoryId' => $product->category->id]) }}">Cancel</a>
            </div>
        </div>
    </form>
</div>
{{-- END:: Product Edit --}}
@endsection

{{-- custom script --}}
@section('script')
    <script src="{{ asset('js/dashboard/modules/product.js') }}"></script>
    <script>
        $(document).ready(function(){
            validAddnEditProduct('edit');
        })
    </script>    
@endsection
