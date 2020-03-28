<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
            <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->user->email) }}" alt="">
            <strong class="ml-2">{{ $discussion->user->name }}</strong>
        </div>
        <div>
            <a href="{{ route('discussions.index') }}" class="btn btn-info text-light btn-sm">Back</a>
        </div>
    </div>
</div>