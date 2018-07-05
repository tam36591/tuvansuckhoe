@extends('front.layout')
@section('content')
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $post->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    {{ __('by') }} <a href="#" class="text-primary">{{ $post->user->name }}</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{ asset(Storage::url($post->thumbnail)) }}" alt="">

                <!-- Date/Time -->
                <p>
                    <span class="glyphicon glyphicon-time"></span> {{ __('Posted on ') }}{{ $post->created_at->diffForHumans() }}
                </p>
                <hr>

                <!-- Post Content -->
                {!! nl2br( $post->content ) !!}

                <hr>

                <p><strong>Tags: </strong>@foreach($post->tags as $tag)
<span class="badge">{{ $tag->name }}</span>
                    @endforeach</p>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                    @foreach($relatePosts as $post)
                        <!-- item -->
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="{{ route('post.show', $post->id) }}">
                                        <img class="img-responsive" src="{{ asset(Storage::url($post->thumbnail)) }}"
                                             alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="{{ route('post.show', $post->id) }}"><b>{{ str_limit($post->title, 25) }}</b></a>
                                </div>
                                <p>{{ $post->description }}</p>
                                <div class="break"></div>
                            </div>
                            <!-- end item -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

@endsection