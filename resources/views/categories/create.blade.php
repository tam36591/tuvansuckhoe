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
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul class="fa-ul">
                        @foreach ($errors->all() as $error)
                            <li><i class="fa-li fa fa-chevron-circle-right"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(['route' => ['categories.store']]) }}

			<div class="form-group">
				<label for="name">{{ __('categories_create.name') }}</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>

			<button class="btn btn-success" type="submit">{{ __('categories_create.save') }}</button>
			{{ Form::close() }}
        </div>
    </div>
@endsection