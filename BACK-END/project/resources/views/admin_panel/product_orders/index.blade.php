@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($orderProducts as $product_order)
        <a href="{{route('admin.order-products.show',$product_order->id)}}">{{$product_order->id}}. {{ $product_order->order_id }}</a><br>
    @endforeach

    {{ $orderProducts ->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.order-products.create')}}@endslot
        @slot('button')Create product order @endslot
    @endcomponent
@endsection
