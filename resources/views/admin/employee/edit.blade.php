@extends('admin.layouts.portlet')
@section('portlet-content')
    @include('layouts.admin-panel-navigation')
    <div class="container">
        <form action="{{route('admin-management.employee-update', $employee)}}" method="post">
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
                <label class="form">Выберите услугу</label>
                <select class="form-select" aria-label="Default select example" name="service_id">

                    @foreach($services as $service)
                        <option value="{{$service->id}}" @if($service->id === $employee->service_id) selected @endif> {{ $service->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form">Выберите категорию работника</label>
                <select class="form-select" aria-label="Default select example" name="employee_category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id === $employee->employee_category_id) selected @endif> {{ $category->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" name="price" type="number" value="{{ $employee->price }}">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
