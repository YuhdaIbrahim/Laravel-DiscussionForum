@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Discussion</div>

    <div class="card-body">
        <form action="{{ route('discussions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div> 

            <div class="form-group">
                <label for="channel">Channel</label>
                <select name="channel" id="channel" class="form-control">
                    @forelse ($channels as $channel)
                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                    @empty
                        <option value="#">No Channel Yet</option>
                    @endforelse
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Create Discussion</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('after-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" rel="stylesheet">
@endpush

@push('after-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    
@endpush

