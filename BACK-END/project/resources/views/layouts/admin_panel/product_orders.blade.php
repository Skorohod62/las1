@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.order-products.create')}}@endslot
        @slot('button')Create product order @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.order-products.edit',$orderProduct->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.order-products.destroy',$orderProduct->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.order-products.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
