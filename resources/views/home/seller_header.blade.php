<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}"><img width="280" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link" href="{{ url('gotoseller') }}">Home </a>
              </li>
              
                <li class="nav-item">
                   <a class="nav-link" href="{{url('/view_seller')}}">SELL</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{url('showInquiries')}}">Products</a>
                </li>
                <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('gotoinquiries') }}">Interests</a>
                  </li>
                  <li class="nav-item">
                      <a class ="nav-link"href="{{url('/view_profile')}}">Profile</a>
                    </li>
                    
                  <li class="nav-item">
                      <form class="access-chatify-form" action="http://127.0.0.1:8000/chatify" method="GET">
                          <button type="submit" class="nav-link">Chat</button>
                      </form>
                  </li>
              </ul>
                

               @if (Route::has('login'))

               @auth

               

               <form action="{{ route('update.user.role') }}" method="POST">
                  @csrf
                  <select class="select-button" name="role" id="role">
                      @if (Auth::user()->role === 'buyer')
                          <option value="buyer" selected disabled>Buyer</option>
                          <option value="seller">Seller</option>
                      @elseif (Auth::user()->role === 'seller')
                          <option value="buyer" >Buyer</option>
                          <option value="seller" selected disabled>Seller</option>
                      @endif
                  </select>
                  <button class="small-button" type="submit">Update Role</button>
              </form>
              
              <div id="dialog" style="display: none;">
                  <p>Please re-login for becoming a buyer</p>
              </div>
              

             
              

               @else
                <li class="nav-item">
                  <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-success" href="{{ route('register') }}">Register</a>
               </li>
               @endauth
                @endif
              
              @if(Auth::check())
              @php
                  $unreadNotifications = Auth::user()->unreadNotifications;
                  $unreadCount = $unreadNotifications->count();
              @endphp
          
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                      <i class="fa fa-bell"></i>
                      @if ($unreadCount > 0)
                          <span class="badge badge-danger">{{ $unreadCount }}</span>
                      @endif
                  </a>
                  <ul class="dropdown-menu">
                      @foreach ($unreadNotifications as $notification)
                          <li class="{{ $notification->read_at ? '' : 'unread' }}">
                              <!-- Display the notification message and link -->
                              <a href="{{ $notification->data['url'] }}">
                                  {{ $notification->data['message'] }}
                              </a>
                          </li>
                      @endforeach
                  </ul>
              </li>
          @endif
          
             </ul>
             
          </div>
       </nav>
    </div>
</header>