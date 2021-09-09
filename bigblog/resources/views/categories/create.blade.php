@extends('layouts.app')
@section('content')
<div class="card-default">
    <div class="card-header">
        {{ isset($category) ? 'Edit Category' : 'Add Category'}}
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
        <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store') }}" method="POST">
        @if(isset($category))
            @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="">Name :</label>
            <input type="text" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}">
        </div>
        <button type="submit" class="btn btn-success">
            {{ isset($category) ? 'Update Category' : 'Add Category'}}
        </button>
        <a href="{{ route('categories.index') }}" class="btn btn-danger">
            Cancel
        </a>
        </form>
    </div>
</div>
@endsection
