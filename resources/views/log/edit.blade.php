
@extends('layouts.app')

@section('title', 'Edit log: ' . $log->id)

@section('content')
    <div class="jumbotron">
        <form action="/log/{{ $log->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="description">Description</label>
                <input
                    type="text"
                    class="form-control"
                    name="description"
                    placeholder="Description"
                    value="{{ $log->description }}"
                >
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="open" {{ $log->status === 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ $log->status === 'closed' ? 'selected' : '' }}>Closed</option>
                    <option value="pending" {{ $log->status === 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
