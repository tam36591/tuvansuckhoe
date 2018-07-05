@extends('admin.layout')
@section('content')

    <div id="page-wrapper">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => "PUT"]) }}

        {{ Form::label('name', "Title:") }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}

        {{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}
        {{ Form::close() }}
    </div>
@endsection