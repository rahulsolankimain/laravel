@extends('layouts.app')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                @include('partials.errors')
                 <form action=" {{ route('users.update-profile') }}" method="POST">
                 @csrf
                @method('PUT')
                 
                 <div class="form-group">
                 <label for="name"></label>
                 <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                 </div>

                 <div class="form-group">
                 <label for="about"></label>
                 <textarea class="form-control" name="about" id="about" cols="4" rows="4">{{ $user->name }}</textarea>
                 </div>

                 <button type="submit" class="btn btn-success">Update Profile</button>
                 </form>
                </div>
            </div>
</div>
@endsection
