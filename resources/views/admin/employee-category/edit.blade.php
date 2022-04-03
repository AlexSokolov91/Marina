@extends('admin.layouts.portlet')
@section('portlet-content')
    @include('layouts.admin-panel-navigation')
    <div class="container">
        <form action="{{route('admin-management.employee-category-update', $employeeCategory)}}" method="post">
            @csrf
            @method('PUT')
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
                <label for="employee" class="form-label">Категория сотрудников</label>
                <input type="text" class="form-control" name="name" id="employee" value="{{$employeeCategory->name}}" placeholder="">
                <br>
                <input type="text" class="form-control" name="description" id="description" value="{{$employeeCategory->description}}">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
