@extends('admin.layouts.portlet')
@section('portlet-content')
    @include('layouts.admin-panel-navigation')
    <div class="container">
        <br>
        <form action="{{route('admin-management.our-work-upload')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-auto">
                    <label for="number" class="visually-hidden">Номер</label>
                    <input type="number" class="form-control" id="number" name="number">
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active">
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </div>
        </form>

        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">Position</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
            <tr>
                <th scope="row"> @if(isset($photo->path))
                        <img src="{{ asset('storage/' . $photo->path) }}" style="width: 100px; height:80px">
                    @endif
                </th>
                <td>{{$photo->number}}</td>
                <td>{{$photo->is_active === 1 ? 'Active' : 'No active' }}</td>
                <td> <form action="{{route('admin-management.our-work-delete', $photo->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
