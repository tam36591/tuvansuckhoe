@extends('admin.layout')
@section('content')

    <div id="page-wrapper">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">{{ __('posts_index.create') }}</a>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>{{ __('posts_index.id') }}</th>
                <th>{{ __('posts_index.title') }}</th>
                <th>{{ __('posts_index.content') }}</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ str_limit($post->title, 80) }}</td>
                    <td>{{ str_limit($post->content, 80) }}</td>

                    <td><a href="{{ route('posts.show', $post->id) }}"><i class="fa fa-eye"></i></a></td>
                    <td><a href="{{ route('posts.edit', $post->id) }}"><i class="fa fa-edit"></i></a></td>
                    <td>
                        <a href="{{ route('posts.destroy', $post->id) }}"
                           onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $post->id }}').submit();">
                            <i class="fa fa-trash"></i>
                        </a>
                        <form id="destroy-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST"
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