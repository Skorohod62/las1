@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name"
                       value="{{$product->name}}">

                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="weight" class="form-label">weight</label>
                <input type="text" name="weight" class="form-control" id="weight"
                       value="{{$product->weight}}">

                @error('weight')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="row">
                <label for="price" class="form-label">price</label>
                <input type="text" name="price" class="form-control" id="price"
                       value="{{$product->price}}">

                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="row">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" name="stock" class="form-control" id="stock"
                       value="{{$product->stock}}">

                @error('stock')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="description" class="form-label">description</label>
                <input type="text" name="description" class="form-control" id="description"
                       value="{{$product->description}}">

                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.products.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
