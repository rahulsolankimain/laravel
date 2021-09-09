@extends('layouts.app')
@section('content')

<div class="card-default">
    <div class="card-header">
        Create Subcategory
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="" name="image">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
              @foreach($categories as $category)
              <option value="{{ $category->id }}">
              {{ $category->name }}
              </option>
              @endforeach
            </select>
         </div>
</div>
@endsection
