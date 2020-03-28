@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-dark text-white">Notifications</div>

    <div class="card-body">
        @foreach ($notifications as $notif)            
        @if ($notif->type === 'App\Notifications\NewReplyAdded')
        <div class="card">
            <div class="card-header bg-info text-white">
                <strong>{{ $notif->data['discussion']['slug'] }}</strong>
            </div>
            <div class="card-body bg-dark">
                <div class="d-flex justify-content-between text-white">
                    A new reply was added to your discussion

                    
                    <a href="{{ route('discussions.show', $notif->data['discussion']['slug']) }}" class="btn btn-sm btn-success text-light">View Discussion</a>
                </div>
            </div>
        </div>
        @endif

        @if ($notif->type === 'App\Notifications\ReplyMarkedAsBestReply')
        <div class="card my-4">
            <div class="card-header bg-info text-white">
                <strong>{{ $notif->data['discussion']['slug'] }}</strong>
            </div>
            <div class="card-body bg-dark">
                <div class="d-flex justify-content-between text-white">
                    Your Reply get marked by the author discussion

                    
                    <a href="{{ route('discussions.show', $notif->data['discussion']['slug']) }}" class="btn btn-sm btn-success text-light">View Discussion</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection
