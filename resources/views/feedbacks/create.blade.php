@extends('front.layout')
@section('content')
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8 col-lg-offset-2">

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
                {{ Form::open(['route' => ['feedback.store']]) }}
                <div class="form-group">
                    <label for="name">{{ __('feedbacks_create.name') }}</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">{{ __('feedbacks_create.phone') }}</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">{{ __('feedbacks_create.email') }}</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">{{ __('feedbacks_create.content') }}</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <button class="btn btn-success">{{ __('feedbacks_create.send') }}</button>

                {{ Form::close() }}

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

@endsection