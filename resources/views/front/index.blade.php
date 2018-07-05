@extends('front.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    @include('front.category')
                </ul>
            </div>

            <div class="col-md-9 ">
                <div class="panel panel-default">

                    @foreach ($posts as $post)
                        <div class="row-item row">
                            <div class="col-md-3">

                                <a href="{{ route('post.show', $post->id) }}">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="{{ asset(Storage::url($post->thumbnail)) }}" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3>{{ str_limit($post->title, 80) }}</h3>
                                <p>{{ str_limit($post->description, 200) }}</p>
                                <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">{{ __('index.more') }} <span
                                            class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <div class="break"></div>
                        </div>
                @endforeach

                <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>

        </div>

    </div>

@endsection