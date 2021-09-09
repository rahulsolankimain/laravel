@extends('layouts.app')

@section('content')


<div class="card">
                @include('partials.discussion-header')

                <div class="card-body">
                <div class="text-center">
                        <strong>
                        {{ $discussion->title}}  
                        </strong>
                    </div>
                 <hr>

                 {!! $discussion->content !!}
                    <div class="card bg-success my-5" style="color:white">
                        <div class="card-header">
                           <div class="d-flex justify-content-between">
                             <div>
                                    <img width="40px" height="40px" style="border-radius:50%" class="mr-2" src="{{ Gravatar::src($discussion->bestReply->owner->email) }}" alt="">
                                    <strong>
                                    {{ $discussion->bestReply->owner->name}}
                                    </strong>
                             </div>
                             <div>
                                <strong>
                                BEST REPLY
                                </strong>
                             </div>
                           </div>
                        </div>
                        <div class="card-body">
                        {!! $discussion->bestReply->content !!}
                        </div>
                    </div>
                </div>

            </div>
@foreach($discussion->replies()->paginate(3) as $reply)
 <div class="card my-5">
    <div class="card-header">
    <div class="d-flex justify-content-between">
        <div class="">
            <img width="40px" height ="40px" style="border-radius: 50%" src="{{ Gravatar::src($reply->owner->email) }}" alt="">
            <span>{{ $reply->owner->name }}</span>
        </div>
        <div class="">
        @if(auth()->user()->id === $discussion->user_id)
            <form action="{{ route('discussion.best-reply',['discussion' => $discussion->slug,'reply' => $reply->id])}}" method="POST">
             @csrf
             <button type="submit" class="btn btn-sm btn-primary">Mark as best reply</button>
            </form>
        @endif
        </div>
    </div>
    </div>

    <div class="card-body">
    
    {!! $reply->content !!}
    
    </div>
 </div>
@endforeach
{{ $discussion->replies()->paginate(3)->links() }}

<div class="card my-5">
    <div class="card-header">
    Add a reply
    </div>
    <div class="card-body">
        @auth
        <form action="{{ route('replies.store',$discussion->slug) }}" method="POST">
        @csrf
            <input id="content" type="hidden" name="content">
            <trix-editor input="content"></trix-editor>

            <button type="submit" class="btn btn-sm my-3 btn-success">
                Add Reply
            </button>
        </form>
        @else

        <a href="{{ route('login') }}" class="btn btn-info">Sign IN to add Reply</a>
        @endauth
    
    </div>

</div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection