@extends('layouts.admin_panel.orders')
@section('content')
    <b>id пользователя:</b> {{ $order->user_id }}<br>
    <b>Общая сумма: </b> {{ $order->total_price }}<br>
    <b>Адрес: </b> {{ $order->address }}<br>
    <b>метод оплаты: </b> {{ $order->payment_method }}<br>
    <b>статус оплаты: </b> {{ $order->payment_status }}<br>
    <b>примерная дата доставки: </b> {{ $order->date }}<br>
    <b>статус: </b> {{ $order->status }}<br>
    <b>дата заказа: </b> {{ $order->order_date }}<br>
@endsection

