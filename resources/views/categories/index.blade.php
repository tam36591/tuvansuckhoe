@extends('admin.layout')
@section('content')

    <div id="page-wrapper">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">{{ __('categories_index.create') }}</a>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>{{ __('categories_index.id') }}</th>
                <th>{{ __('categories_index.name') }}</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><a href="{{ route('categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a></td>
                    <td>
                        <a href="{{ route('categories.destroy', $category->id) }}"
                           onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $category->id }}').submit();">
                            <i class="fa fa-trash"></i>
                        </a>
                        <form id="destroy-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST"
                              style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection