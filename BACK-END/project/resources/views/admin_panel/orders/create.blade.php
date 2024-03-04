@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.orders.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <label for="total_price" class="form-label">Total price</label>
                <input type="text" name="total_price" class="form-control" id="total_price"
                       value="{{old('total_price')}}">

                @error('total_price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="address" class="form-label">address</label>
                <input type="text" name="address" class="form-control" id="address"
                       value="{{old('address')}}">

                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="row">
                <label for="payment_method" class="form-label">payment method</label>
                <input type="text" name="payment_method" class="form-control" id="payment_method"
                       value="{{old('payment_method')}}">

                @error('payment_method')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="row">
                <label for="payment_status" class="form-label">payment status</label>
                <input type="text" name="payment_status" class="form-control" id="payment_status"
                       value="{{old('payment_status')}}">

                @error('payment_status')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="date" class="form-label">date</label>
                <input type="date" name="date" class="form-control" id="date"
                       value="{{old('date')}}">

                @error('date')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="status" class="form-label">status</label>
                <input type="text" name="status" class="form-control" id="status"
                       value="{{old('status')}}">

                @error('status')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="order_date" class="form-label">order date</label>
                <input type="date" name="order_date" class="form-control" id="order_date"
                       value="{{old('order_date')}}">

                @error('order_date')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <label for="user_id" class="form-label">Role</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="user_id"
                        id="user_id">
                    @foreach($users as $user)
                        <option
                            {{old('user_id') == $user->id ? ' selected' : ''}}
                            value={{$user->id}}>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <label for="administrator_id" class="form-label">Role</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="administrator_id"
                        id="administrator_id">
                    @foreach($users as $user)
                        <option
                            {{old('user_id') == $user->id ? ' selected' : ''}}
                            value={{$user->id}}>{{$user->name}}</option>
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
        @slot('link'){{route('admin.products.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
