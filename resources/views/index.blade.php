@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <h1>{{ env("APP_NAME") }} : All posts</h1>
            @foreach ($all_posts as $post)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96" /><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text></svg>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text text-right">
                                    <small class="text-muted">
                                        {{ date("Y-m-d", strtotime($post->created_at)) }}
                                    </small>
                                </p>
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text text-justify"> {{ mb_strimwidth($post->description, 0, 100) }} </p>
                                <a href="/post/{{ $post->id }}">
                                    <button type="button" class="btn btn-primary">
                                        details
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="paginate">
                {{ $all_posts->links() }}
            </div>
        </div>
    </div>
@endsection
