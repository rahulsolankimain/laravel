@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-dark" href="{{ route('posts.create') }}">
        Add Post
    </a>
</div>
<div class="card-default">
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">EDIT</a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger" >DELETE</button>
                    </td>
                     </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
