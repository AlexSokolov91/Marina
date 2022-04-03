@extends('admin.layouts.portlet')
@section('portlet-content')
   @include('layouts.admin-panel-navigation')
   <br>
   <br>
        <div class="container">
            <a type="button" style="margin-left: 76rem" class="btn btn-success" href="{{route('admin-management.service-create')}}">Создать</a>
            <br>
            <br>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                <tr>
                    <th scope="row">{{$service->name}}</th>
                    <td>
                        <a href="{{route('admin-management.service-edit', $service->id)}}">Редактировать</a>
                        <form action="{{route('admin-management.service-delete', $service->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            {{ $services->links() }}
            <br>
            <p>
                Displaying {{$services->count()}} of {{ $services->total() }} services(s).
            </p>
        </div>

@endsection
