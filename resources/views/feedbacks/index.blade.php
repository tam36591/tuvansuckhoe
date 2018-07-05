@extends('admin.layout')
@section('content')

    <div id="page-wrapper">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>{{ __('feedbacks_index.id') }}</th>
                <th>{{ __('feedbacks_index.name') }}</th>
                <th>{{ __('feedbacks_index.phone') }}</th>
                <th>{{ __('feedbacks_index.email') }}</th>
                <th>{{ __('feedbacks_index.content') }}</th>
                <td>{{ __('Trạng thái') }}</td>
            </tr>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->phone }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ str_limit($feedback->content, 80) }}</td>
                    <td>
                        @if($feedback->status)
                            <span class="badge">{{ __('Đã phản hồi') }}</span>
                        @else <span class="badge">{{ __('Chờ phản hồi') }}</span>
                        @endif
                    </td>
                    <td><a href="{{ route('feedbacks.show', $feedback->id) }}"><i class="fa fa-eye"></i></a></td>
                    <td>
                        <a href="{{ route('feedbacks.destroy', $feedback->id) }}"
                           onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">
                            <i class="fa fa-trash"></i>
                        </a>
                        <form id="destroy-form" action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST"
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