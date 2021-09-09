@extends('layouts.app')
@section('content')
<div class="container">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                 <li class="list-group-item">
                     {{ $error }}
                 </li>
            @endforeach
        </div>
        @endif
</div>
<div class="card-default">
    <div class="card-header">
       {{ isset($category) ? 'EDIT Category' : 'Create Category' }}
    </div>
    <div class="card-body">
    <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($category))
            @METHOD('PUT')
            @endif
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name" value="{{ isset($category) ? $category->name : '' }}">
            </div>
            @if(isset($category))
            <img src="{{ asset('/storage/'.$category->image) }}" style="height:300px;width:100% " alt="">
            @endif
            <div class="form-group">
                <label for="image">Upload File Here</label>
                <input type="file" class="form-control" name="image" placeholder="Upload file">
              </div>
            <button type="submit" class="btn-sm btn-primary mr-2">{{ isset($category) ? 'EDIT' : 'ADD' }}</button>
            <a href="{{ route('categories.index') }}" class="btn-sm btn-danger mr-2">CANCLE</a>
          </form>
    </div>
</div>
@endsection
