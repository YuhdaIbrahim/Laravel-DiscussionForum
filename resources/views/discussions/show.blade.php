@extends('layouts.app')

@section('content')
<div class="card mb-4">
    @include('partials.header')
    
    <div class="card-body">
        <h5>
            {{ $discussion->title }}
        </h5>

        <p>
            {!! $discussion->content !!}
        </p>
        @if ($discussion->bestReply)
            
        <div class="card"> 
            <div class="card-header bg-success text-white">
                <div class="d-flex justify-content-between">
                    <div>
                        <img width="40px" height="40px" class="mr-2" style="border-radius: 50%" src="{{ Gravatar::src($discussion->bestReply->user->email) }}" alt="">
                        <span>{{ $discussion->bestReply->user->name }}</span>
                    </div>
                    Best Reply
                </div>
            </div>
            <div class="card-body">
                {!! $discussion->bestReply->content !!}
            </div>
        </div>
    @endif
    </div>
</div>

@foreach ($discussion->replies()->paginate(3) as $reply)
    <div class="card my-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($reply->user->email) }}" alt="images">
                    <span>{{ $reply->user->name }}</span>
                </div>
                <div>
                    @auth
                    @if (auth()->user()->id === $discussion->user_id)
                    <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-info text-light">Mark best Reply</button>
                    </form>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! $reply->content !!}


        </div>
    </div>

    @endforeach
    {{ $discussion->replies()->paginate(3)->links() }}

<div class="card my-4">
    <div class="card-header">
        Add a Reply
    </div>

    <div class="card-body">
        @auth            
        <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
            @csrf
            <div class="form-group">
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-success">Add Reply</button>
            </div>
        </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-info">Sign In to add a reply</a>
        @endauth
    </div>
</div>

@endsection

@push('after-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" rel="stylesheet">
@endpush

@push('after-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    
@endpush



