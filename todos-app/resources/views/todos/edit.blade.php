@extends('layouts.app')
@section('content')
<h1 class="text-center my--5">Edit Todos</h1>

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card card-default">

            <div class="card-header">Edit Todo</div>

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

                    <form action="/todos/{{ $todo->id }}/update-todos" method="POST">

                    @csrf

                      <!--  <input type="hidden" value="{{ $todo->id }}"> this is one way to send todo id for edit -->

                        <div class="form-group">

                                <input type="text" class="form-control" name='name' placeholder='Name of todo' value="{{ $todo->name }}">

                        </div>

                        <div class="form-group">
                        
                                <textarea name="description" cols="4" placeholder='Description of todo' rows="4" class="form-control">{{ $todo->description }}</textarea>
                        
                        </div>

                        <div class="form-group text-center">
                        
                                <button type="submit" class="btn btn-success">Update Todo</button>
                        
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection