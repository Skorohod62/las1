@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name"
                       value="{{old('name')}}">

                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="weight" class="form-label">weight</label>
                <input type="text" name="weight" class="form-control" id="weight"
                       value="{{old('weight')}}">

                @error('weight')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="row">
                <label for="price" class="form-label">price</label>
                <input type="text" name="price" class="form-control" id="price"
                       value="{{old('price')}}">

                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="row">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" name="stock" class="form-control" id="stock"
                       value="{{old('stock')}}">

                @error('stock')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="description" class="form-label">description</label>
                <input type="text" name="description" class="form-control" id="description"
                       value="{{old('description')}}">

                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="row">
                <label for="image0" class="form-label">image</label>
                <input type="file" name="image0" class="form-control" id="image0">

                @error('image0')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.products.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
