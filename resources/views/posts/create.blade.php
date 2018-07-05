@extends('admin.layout')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul class="fa-ul">
                        @foreach ($errors->all() as $error)
                            <li><i class="fa-li fa fa-chevron-circle-right"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(['route' => ['posts.store'], 'enctype'=> 'multipart/form-data']) }}

            <div class="form-group">
                <label for="title">{{ __('posts_create.title') }}</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="thumbnail">{{ __('posts_create.thumbnail') }}</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">{{ __('posts_create.description') }}</label>
                <textarea name="description" id="description" cols="30" rows="2" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">{{ __('posts_create.category') }}</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="tags">{{ __('posts_create.tag') }}</label>
                <select class="form-control select2-multi" name="tags[]" id="tags" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="editor">{{ __('posts_create.content') }}</label>
                <textarea name="content" id="editor"></textarea>
            </div>

            <button class="btn btn-success" type="submit">{{ __('posts_create.save') }}</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection