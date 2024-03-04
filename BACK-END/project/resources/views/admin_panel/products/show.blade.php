@extends('layouts.admin_panel.products')
@section('content')
    <b>Имя:</b> {{ $product->name }}<br>
    <b>Дозировка: </b> {{ $product->weight }}<br>
    <b>Цена: </b> {{ $product->price }}<br>
    <b>Количество в наличии: </b> {{ $product->stock }}<br>
    <b>Характеристика: </b> {{ $product->description }}<br>
    <img src="{{asset(\Illuminate\Support\Facades\Storage::url($product->image))}}" alt="" />
@endsection

