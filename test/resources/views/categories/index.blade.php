@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-3">
<a href="{{ route('categories.create') }}" class="btn btn-info">ADD Category</a>
</div>
<div class="card-default">
    <div class="card-header">
        Category
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th >Id</th>
                <th >Image</th>
                <th >Name</th>
                <th >Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
              <tr>
                 <td>
                     {{ $category->id }}
                 </td>
                 <td>
                     <img src="{{ asset('/storage/'.$category->image) }}" style="height:100px;width:200px" alt="">
                 </td>
                 <td>{{ $category->name }}</td>
                 <td>
                     <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary btn-sm">EDIT</a>
                 </td>
                 <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                    @csrf
                    @METHOD('DELETE')
                    <td>
                        <button type="submit" class="btn btn-sm btn-danger">DELEETE</button>
                    </td>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
