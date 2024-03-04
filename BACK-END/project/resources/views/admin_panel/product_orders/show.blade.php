@extends('layouts.admin_panel.product_orders')
@section('content')
    <b>id заказа:</b> {{ $orderProduct->order_id }}<br>
    <b>id продукта: </b> {{ $orderProduct->product_id }}<br>
    <b>количество: </b> {{ $orderProduct->quantity }}<br>
    <b>промежуточная сумма: </b> {{ $orderProduct->subtotal_price }}<br>
@endsection

