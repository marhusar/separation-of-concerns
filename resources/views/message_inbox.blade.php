@extends('layout')

@section('content_title', 'Message Inbox')

@section('content')
    <p>This is my inbox content.</p>
    <ul>
        @php
            /** @var \App\Communication\Policy\ShowMessagePolicy $showMessagePolicy */
            $showMessagePolicy = app(\App\Communication\Policy\ShowMessagePolicy::class);
        @endphp
        @foreach($messages as $message)
                @if ($showMessagePolicy->showMessageToUser($message, $currentUser) === true)
                <li>
                    {{ $message->getBody() }}
                </li>
                @endif
        @endforeach
    </ul>
@endsection