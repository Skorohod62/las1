@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($orders as $order)
        <a href="{{route('admin.orders.show',$order->id)}}">{{@$order->id}}. {{ $order->address }}</a><br>
    @endforeach

    {{ $orders->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.orders.create')}}@endslot
        @slot('button')Create orders @endslot
    @endcomponent
@endsection
