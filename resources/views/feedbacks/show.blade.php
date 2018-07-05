@extends('front.layout')
@section('content')
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-md-6">

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

                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p><strong>Name: </strong>{{ $feedback->name }}</p>
                            <p><strong>Phone: </strong>{{ $feedback->phone }}</p>
                            <p><strong>Email: </strong>{{ $feedback->email }}</p>
                            <p><strong>Status: </strong>@if($feedback->status)
                                    <span class="badge">{{ __('Đã phản hồi') }}</span>
                                @else <span class="badge">{{ __('Chờ phản hồi') }}</span>
                                @endif</p>
                            <p><strong>Content: </strong>{{ $feedback->content }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ Form::open(['route' => ['feedbacks.reply', $feedback->id]]) }}

                            <div class="form-group">
                                <label for="content">{{ __('Trả lời') }}</label>
                                @if($feedback->status)
                                    <textarea name="content" id="content" cols="30" rows="10"
                                              class="form-control" readonly>{{ $feedback->feedback }}</textarea>
                                @else
                                    <textarea name="content" id="content" cols="30" rows="10"
                                              class="form-control"></textarea>
                                @endif
                            </div>
                            @if(!$feedback->status)
                                <button class="btn btn-success">{{ __('feedbacks_create.send') }}</button>
                            @endif

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

@endsection