@extends('layouts.app')

@section('content')

@foreach ($discussions as $discussion)
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->user->email) }}" alt="">
                    <strong class="ml-2">{{ $discussion->user->name }}</strong>
                </div>
                <div>
                    <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-success btn-sm">View</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <h5>
                {{ $discussion->title }}
            </h5>
        </div>
    </div>
@endforeach

{{ $discussions->appends(['channel' => request()->query('channel')])->links() }}
@endsection
