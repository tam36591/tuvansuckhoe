@extends('admin.layout')

@section('content')
    <div id="page-wrapper">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="fa-ul">
                    @foreach ($errors->all() as $error)
                        <li><i class="fa-li fa fa-chevron-circle-right"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row" style="margin-bottom: 20px; ">
            <div class="col-sm-2">
                <a class="btn btn-primary ripple" href="{{ action('RoleController@create') }}">Thêm Role</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh Sách Role</h3>
                    </div>

                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles->all() as $role)
                                <tr id="{{ $role->id }}">
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }} </td>
                                    <td><a href="{{ route('roles.edit', $role->id) }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('roles.destroy', $role->id) }}"
                                           onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $role->id }}').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="destroy-form-{{ $role->id }}"
                                              action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                              style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection