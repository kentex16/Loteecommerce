@livewireScripts
<div class="container">
        <h2>Listed Products</h2>
        @if ($listedProducts !== null && $listedProducts->count() > 0)
            <ul>
                @foreach ($listedProducts as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No listed products available.</p>
        @endif

        <h2>Notifications</h2>
        @if ($notifications !== null && $notifications->count() > 0)
            <ul>
                @foreach ($notifications as $notification)
                    <li>{{ $notification->message }}</li>
                @endforeach
            </ul>
        @else
            <p>No notifications available.</p>
        @endif

        <h2>Views</h2>
        @if ($views !== null && $views->count() > 0)
            <ul>
                @foreach ($views as $view)
                    <li>{{ $view->user->name }} viewed your product "{{ $view->product->name }}"</li>
                @endforeach
            </ul>
        @else
            <p>No views available.</p>
        @endif
        @livewireStyles
    </div>

