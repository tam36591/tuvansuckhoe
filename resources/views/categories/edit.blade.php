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
            {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) }}
			<div class="form-group">
				<label for="name">{{ __('categories_edit.name') }}</label>
				<input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
			</div>

			<button class="btn btn-success" type="submit">{{ __('categories_edit.save') }}</button>
			{{ Form::close() }}
        </div>
    </div>
@endsection