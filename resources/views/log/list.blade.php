@extends('layouts.app')

@section('title', 'Logs listing')

@section('content')
    <p><a href="{{ url('log/create') }}" class="btn btn-primary">Create log</a></p>

    <ul class="list-group">
        @foreach ($logs as $log)
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
                <a href="/user/{{ $log->user->id }}/edit">
                    <strong>{{ $log->user->full_name }}</strong>
                </a>
                <br>

                <span>{{ $log->description }}</span>

                <a class="pull-right" href="/log/{{ $log->id }}/edit">
                    <strong>edit</strong>
                </a>
            </li>
        @endforeach
    </ul>

    {{ $logs->links() }}
@endsection
