@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif
            <form method="post" action="{{ route("post.update", $post->id) }}" class="create-new-post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlTitle">Title</label>
                    <input name="title" type="text" class="form-control" id="exampleFormControlTitle" placeholder="Post title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlDescription">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlDescription" rows="7">{{$post->description}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            </form>
        </div>
    </div>
@endsection
