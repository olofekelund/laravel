@extends('layouts.app')

@section('title', 'Create new log')

@section('content')
    <div class="jumbotron">
        <form action="/log" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="description">Description</label>
                <input
                    type="text"
                    class="form-control"
                    name="description"
                    placeholder="Description"
                >
            </div>

            <div class="form-group">
                <label for="user">User email</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="User email"
                >
            </div>

            <div class="form-group">
                <label for="device_id">Device id</label>
                <input
                    type="text"
                    class="form-control"
                    name="device_id"
                    placeholder="Device id"
                >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
