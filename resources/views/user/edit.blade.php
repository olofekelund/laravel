@extends('layouts.app')

@section('title', 'Edit user: ' . $user->full_name)

@section('content')
    <div class="jumbotron">
        <form action="/user/{{ $user->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="email">Email address</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    aria-describedby="emailHelp"
                    placeholder="Enter email"
                    value="{{ $user->email }}"
                >
            </div>
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input
                    type="text"
                    class="form-control"
                    name="firstname"
                    placeholder="Firstname"
                    value="{{ $user->firstname }}"
                >
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input
                    type="text"
                    class="form-control"
                    name="lastname"
                    placeholder="Lastname"
                    value="{{ $user->lastname }}"
                >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <ul class="list-group">
        @foreach ($user->logs as $log)
            <?php
                $labelClasses = [
                    'open'    => 'label-success',
                    'closed'  => 'label-default',
                    'pending' => 'label-warning'
                ];

                $labelClass = $labelClasses[$log->status];
            ?>
            <li class="list-group-item clearfix">
                <span class="label {{ $labelClass }} pull-right">{{ $log->status }}</span>
                <a href="/log/{{ $log->id }}/edit">
                    <strong>log: {{ $log->id }}</strong>
                </a>
                <br>

                <span>{{ $log->description }}</span>

                <a class="pull-right" href="/log/{{ $log->id }}">
                    <strong>edit</strong>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
