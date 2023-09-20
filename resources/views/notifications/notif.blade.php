@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Notifications</h1>
    <ul>
        @foreach($notifications as $notification)
            <li>
                {{ $notification->data['message'] }}
                <a href="{{ $notification->data['link'] }}">View</a>
            </li>
        @endforeach
    </ul>
    {{ $notifications->links() }}
</div>
@endsection
