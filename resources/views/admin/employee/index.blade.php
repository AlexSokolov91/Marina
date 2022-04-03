@extends('admin.layouts.portlet')
@section('portlet-content')
    @include('layouts.admin-panel-navigation')
    <br>
    <br>
    <div class="container">
        <a type="button" style="margin-left: 76rem" class="btn btn-success" href="{{ route('admin-management.employee-create') }}">Создать</a>
        <br>
        <br>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Категория сотрудника</th>
                <th scope="col">Услуга</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>

            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->employeeCategorie->name}}</th>
                    <th scope="row">{{$employee->service->name}}</th>
                    <td>
                        <a href="{{route('admin-management.employee-edit', $employee->id)}}">Редактировать</a>
                        <form action="{{route('admin-management.employee-delete', $employee->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        {{ $employees->links() }}
        <br>
        <p>
            Displaying {{$employees->count()}} of {{ $employees->total() }} employee(s).
        </p>
    </div>

@endsection
