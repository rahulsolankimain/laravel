@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        Add Category
    </a>
</div>
<div class="card-default">
    <div class="card-header">
        Categories
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
             @foreach($categories as $category)
             <tr>
                <td>{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary sm">
                        Edit
                    </a>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
