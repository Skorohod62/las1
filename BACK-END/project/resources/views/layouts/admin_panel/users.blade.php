@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.users.create')}}@endslot
        @slot('button')Create user @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.users.edit',$user->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.users.destroy',$user->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.users.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
