
<style>
      .small-button{
            font-size: 10px;
        }
        .select-button{
            margin-left: 5px;
            padding: 4px 28px;
        }
  
        .dropdown .dropdown-menu {
                min-width: 250px; /* Adjust the width as needed */
                max-height: 300px; /* Set a maximum height for the dropdown */
                overflow-y: auto; /* Enable vertical scrolling if needed */
            }

            .dropdown .dropdown-menu li {
                padding: 10px;
                border-bottom: 1px solid #ccc;
            }

            .dropdown .dropdown-menu li:last-child {
                border-bottom: none; /* Remove the border for the last item */
            }

            .dropdown .dropdown-menu a {
                display: block;
                text-decoration: none;
                color: #333;
            }

            .dropdown .dropdown-menu a:hover {
                background-color: #f5f5f5; /* Change the background color on hover */
            }

            .dropdown .dropdown-toggle i {
                font-size: 18px; /* Adjust the icon size as needed */
            }
     
</style>
<header class="header_section">
    <div class="page-content">
        <div class="container">
           <nav class="navbar navbar-expand-lg custom_nav-container">
              <a class="navbar-brand" href="{{ url('/') }}"><img width="280" src="images/logo.png" alt="#" /></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav">
                    <li class="nav-item active">
                       <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                       @guest
                       <!-- Display this when the user is logged in -->
                       <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                          aria-haspopup="true" aria-expanded="true">
                          <span class="nav-label">Pages <span class="caret"></span>
                       </a>
                       <ul class="dropdown-menu">
                          <li><a href="#slider">About</a></li>
                          <li><a href="#inquiries">Inquiries</a></li>
                       </ul>
                       @else
                       <a class="nav-link" href="{{ route('login') }}" onclick="showDialog(event)">Soon</a>
                       @endguest
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="{{ url('/view_products') }}">SALES</a>
                    </li>
                    <li class="nav-item">
                       @if (Auth::check())
                       <a class="nav-link" href="{{ url('/view_profile') }}">Visit Profile</a>
                       @else
                       <a class="nav-link" href="#testimonial">Testimonial</a>
                       @endif
                    </li>
                    <li class="nav-item">
                       <form class="access-chatify-form" action="http://127.0.0.1:8000/chatify" method="GET">
                          <button type="submit" class="nav-link">Chat</button>
                       </form>
                    </li>
                 </ul>
                 <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                    @auth
                    <x-app-layout></x-app-layout>
                    <form action="{{ route('update.user.role') }}" method="POST" class="d-flex">
                       @csrf
                       <select class="select-button" name="role" id="role">
                          @if (Auth::user()->role === 'buyer')
                          <option value="buyer" selected disabled>Buyer</option>
                          <option value="seller">Seller</option>
                          @elseif (Auth::user()->role === 'seller')
                          <option value="buyer">Buyer</option>
                          <option value="seller" selected disabled>Seller</option>
                          @endif
                       </select>
                       <button class="small-button" type="submit">Update Role</button>
                    </form>
                    @else
                    <li class="nav-item">
                       <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                       <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    @endif
                    <li class="nav-item">
                       @if (Auth::check())
                       @php
                       $unreadNotifications = Auth::user()->unreadNotifications;
                       $unreadCount = $unreadNotifications->count();
                       @endphp
                       <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                          aria-expanded="false" aria-haspopup="true">
                          <i class="fa fa-bell"></i>
                          @if ($unreadCount > 0)
                          <span class="badge badge-danger">{{ $unreadCount }}</span>
                          @endif
                       </a>
                       <ul class="dropdown-menu dropdown-menu-right">
                          @foreach ($unreadNotifications as $notification)
                          <li class="{{ $notification->read_at ? '' : 'unread' }}">
                             <!-- Display the notification message and link -->
                             <a href="{{ $notification->data['url'] }}">
                                {{ $notification->data['message'] }}
                             </a>
                          </li>
                          @endforeach
                       </ul>
                       @endif
                    </li>
                 </ul>
              </div>
           </nav>
        </div>
    </div>
    
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
   
    <script>
       window.addEventListener('load', function () {
          
          const header = document.querySelector('.header_transition');
 
        
          header.classList.add('active');
       });
    </script>
    <script>
      function showDialog(event) {
          event.preventDefault(); 
          
          const confirmation = window.confirm("Soon to be fixed");
          
        
          if (confirmation) {
              
              window.location.href = event.target.href; 
          } else {
              
              
          }
      }
      </script>
 </header>
 