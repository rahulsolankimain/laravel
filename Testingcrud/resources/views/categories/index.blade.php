@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('categories.create') }}" class="btn btn-dark">Create Category</a>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                   <th>Image</th>
                   <th>Name</th>
                   <th></th>
                   <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                  <tr>
                  <td>
                  <img src="{{ asset("/storage/".$category->image) }}" style="width:100px;height:100px" alt="">
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-dark">Edit</a>
                    </td>
                    <td>
                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
        </div>
    </div>
</div>
@endsection
