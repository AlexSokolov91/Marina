@extends('admin.layouts.portlet')
@section('portlet-content')
    @include('layouts.admin-panel-navigation')
    <br>
    <br>
    <div class="container">
        <a type="button" style="margin-left: 76rem" class="btn btn-success" href="{{ route('admin-management.employee-category-create') }}">Создать</a>
        <br>
        <br>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->name}}</th>
                    <th scope="row">{{$employee->description}}</th>
                    <td>
                        <a href="{{route('admin-management.employee-category-edit', $employee->id)}}">Редактировать</a>
                        <form action="{{route('admin-management.employee-category-delete', $employee->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
