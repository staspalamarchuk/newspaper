@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <div class="card mb-3">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96" /><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text></svg>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text text-justify">{{ $post->description }}</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-warning">
                        <a href="/post/{{ $post->id }}/edit" class="btn-edit">
                            Edit
                        </a>
                    </button>
                    <button type="button" class="btn btn-danger" onclick="event.preventDefault();
                        document.getElementById(
                        'delete-form-{{$post->id}}').submit();">Remove</button>
                    <form id="delete-form-{{$post->id}}" action="{{route('post.destroy', $post->id)}}"
                          method="post">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
