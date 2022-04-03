@extends('admin.layouts.portlet')
@section('portlet-content')
    @include('layouts.admin-panel-navigation')
    <div class="container">
        <br>
        <br>
        <form action="{{route('admin-management.employee-store')}}" method="post">
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
                <label class="form">Выберите услугу</label>
                <select class="form-select" aria-label="Default select example" name="service_id">
                    @foreach($services as $service)
                        <option value="{{$service->id}}"> {{ $service->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form">Выберите категорию работника</label>
                <select class="form-select" aria-label="Default select example" name="employee_category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{ $category->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" name="price" type="number">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
