@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.orders.create')}}@endslot
        @slot('button')Create order @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.orders.edit',$order->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.orders.destroy',$order->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.orders.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
