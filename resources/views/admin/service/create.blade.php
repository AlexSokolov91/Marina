@extends('admin.layouts.portlet')
@section('portlet-content')
    @include('layouts.admin-panel-navigation')
    <div class="container">
        <form action="{{route('admin-management.service-store')}}" method="post">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="service" class="form-label">Услуга</label>
                <input type="text" class="form-control" name="name" id="service">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
