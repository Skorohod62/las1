@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($products as $product)
        <a href="{{route('admin.products.show',$product->id)}}">{{$product->id}}. {{ $product->name }}</a><br>
    @endforeach

    {{ $products->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.products.create')}}@endslot
        @slot('button')Create products @endslot
    @endcomponent
@endsection
