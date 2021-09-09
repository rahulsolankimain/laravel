@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($category) ? 'Edit Category' : 'Create Category' }}
    </div>
    <div class="card-body">
        @if($errors->any())
       <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
       </div>
        @endif
        <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($category))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ isset($category) ? $category->name : ''}}">
            </div>
            @if(isset($category))
            <div class="form-group">
                <img src="{{ asset("/storage/".$category->image) }}" alt="" style="width:100%;height:300px">
            </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="" name="image">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">
                    {{ isset($category) ? 'Edit' : 'Create Category' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
