@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('categories.create') }}" class="btn btn-dark">Create Category</a>
    </div>

            <div class="card">
                <div class="card-header">
                    Categories
                </div>
                <div class="card-body">
                    @if($categories->count()>0)
                    <table class="table">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>
                                   <img src="{{ asset("/storage/".$category->image) }}" style="width:100px;height:100px">
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-dark btn-sm">Edit</a>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
                        <div class="modal-dialog">
                            <form action="" method="POST" id="deletecategoryform">
                                @csrf
                                @method('DELETE')
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Are you Sure You ant to delete?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                              <button type="submit" class="btn btn-danger">Yes,Delete</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                    @else
                    <h3 class="text-center">No Category Yet</h3>
                    @endif
            </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function handleDelete(id)
    {
        var form = document.getElementById('deletecategoryform');
        form.action = '/categories/ '+ id;
        $('#deleteModal').modal('show');
    }
</script>
@endsection
