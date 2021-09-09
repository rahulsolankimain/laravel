@extends('layouts.app')
@section('content')
<div class="card default">
    <div class="card-header">
        {{ isset($post) ? 'Edit Post' : 'Add Post' }}
    </div>
    <div class="card-body">
       @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
       @endif
        <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store') }}" method="POST">
            @if(isset($post))
            @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Name of Post</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($post) ? $post->name : '' }}">
            </div>
            <button type="submit" class="btn btn-primary">
                {{ isset($post) ? 'Edit' : 'Add Post' }}
            </button>
            <a  href="{{ route('posts.index') }}" class="btn btn-danger">
                CANCEL
            </a>
        </form>
    </div>
</div>
@endsection
