@extends('layout')

@section('content_title', 'Message Inbox')

@section('content')
    <p>This is my inbox content.</p>
    <ul>
        @foreach($messages as $message)
                <li>
                    {{ $message->getBody() }}
                </li>
        @endforeach
    </ul>
@endsection