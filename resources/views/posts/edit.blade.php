@extends('admin.layout')
@section('content')

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
            {{ Form::open(['route' => ['posts.update', $post->id], 'method' => 'put', 'enctype'=> 'multipart/form-data']) }}
			<div class="form-group">
				<label for="title">Tiêu đề</label>
				<input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
			</div>

            <div class="form-group">
                <label for="thumbnail">{{ __('posts_create.thumbnail') }}</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            </div>

			<div class="form-group">
				<label for="description">Description</label>
				<input type="text" name="description" id="description" class="form-control" value="{{ $post->description }}">
			</div>

			<div class="form-group">
				<label for="category_id">{{ __('posts_edit.category') }}</label>
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				<label for="category_id">{{ __('posts_edit.tag') }}</label>
                {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
			</div>

			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="editor">{{ $post->content }}</textarea>				
			</div>

			<button class="btn btn-success" type="submit">Save</button>
			{{ Form::close() }}
        </div>
    </div>
@endsection