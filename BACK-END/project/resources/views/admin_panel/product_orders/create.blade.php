@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.order-products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <label for="quantity" class="form-label">quantity</label>
                <input type="text" name="quantity" class="form-control" id="quantity"
                       value="{{old('quantity')}}">

                @error('quantity')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="subtotal_price" class="form-label">subtotal_price</label>
                <input type="text" name="subtotal_price" class="form-control" id="subtotal_price"
                       value="{{old('subtotal_price')}}">

                @error('subtotal_price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="order_id" class="form-label">order_id</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="order_id"
                        id="order_id">
                    @foreach($orders as $order)
                        <option
                            {{old('order_id') == $order->id ? ' selected' : ''}}
                            value={{$order->id}}>{{$order->address}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <label for="product_id" class="form-label">products_id</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="product_id"
                        id="product_id">
                    @foreach($products as $product)
                        <option
                            {{old('product_id') == $product->id ? ' selected' : ''}}
                            value={{$product->id}}>{{$product->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.order-products.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
