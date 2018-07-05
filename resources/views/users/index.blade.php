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
                <a class="btn btn-primary ripple" href="{{ action('UserController@create') }}">Thêm User</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh Sách User</h3>
                    </div>

                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr id="{{ $user->id }}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }} </td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <i class="label label-default">{{ $role->name }}</i>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('users.destroy', $user->id) }}"
                                           onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $user->id }}').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="destroy-form-{{ $user->id }}"
                                              action="{{ route('users.destroy', $user->id) }}" method="POST"
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