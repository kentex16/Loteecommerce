

<!DOCTYPE html>
<html>
   <head>
      <style>
           .page-transition {
         transform: translateX(-100%);
         opacity: 0;
         transition: transform 0.5s ease, opacity 0.5s ease; /* Increased duration to 1 second */
      }

      /* Final state of the page (visible) */
      .page-transition.active {
         transform: translateX(0);
         opacity: 1;
      }
      @keyframes floatAnimation {
    0% {
        transform: translateY(0);
        opacity: 0;
    }
    50% {
        transform: translateY(-20px); /* Adjust the float height as needed */
        opacity: 0.7;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}
        #chatify-popup {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    border-radius: 5px;
        }

        #toggle-chatify {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px 5px 0 0;
            cursor: pointer;
            width: 100%;
        }
        #chatify-iframe-container {
            display: none; /* Initially hide the chat content */
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 5px 5px;
            max-height: 400px; /* Set a larger maximum height for the popup */
            overflow: hidden;
            position: relative;
        }


        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        #close-chatify {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #ccc;
            border: none;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        #resize-handle {
            width: 100%;
            height: 10px; /* Define the height of the draggable handle */
            background-color: #007BFF; /* Handle background color */
            cursor: ns-resize; /* Vertical resize cursor */
            position: absolute;
            top: 0;
            left: 0;
        }
      </style>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Lote.ph</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
     
      <div class="page-transition">
      <div class="hero_area">
         
         <!-- header section strats -->
         @if (Auth::user()->role === 'buyer')
         @include('home.header')
         @else
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
                       <a class="nav-link" href="{{url('showInquiries')}}">My Products</a>
                    </li>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('gotoinquiries') }}">Interests</a>
                      </li>
                      <li class="nav-item">
                          <a class ="nav-link"href="{{url('/view_profile')}}">Visit Profile</a>
                        </li>
                      <li class="nav-item">
                          <form class="access-chatify-form" action="http://127.0.0.1:8000/chatify" method="GET">
                              <button type="submit" class="nav-link">Chat</button>
                          </form>
                      </li>
                  </ul>
                    <form class="form-inline">
                      <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                      </button>
                   </form>
    
                   @if (Route::has('login'))
    
                   @auth
    
                   <x-app-layout>
    
                   </x-app-layout>
    
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
                    <div id="chatify-popup">
                      <div id="resize-handle"></div>
                      <button id="toggle-chatify">Open Chat</button>
                      <div id="chatify-iframe-container">
                          <iframe src="http://127.0.0.1:8000/chatify"></iframe>
                          <button id="close-chatify">Close</button>
                      </div>
                  </div>
                  @if(Auth::check())
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                          <i class="fa fa-bell"></i>
                      </a>
                      <ul class="dropdown-menu">
                          @foreach (Auth::user()->unreadNotifications as $notification)
                              <li>
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
     @endif
         <!-- end header section -->
         <!-- slider section -->
         
        
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-md-8">
                     <div class="card">
                         <div class="card-header bg-primary text-white">My Profile</div>
         
                         <div class="card-body">
                             <div class="text-center">
                                 <form action="{{ route('update-profile-photo') }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <div class="form-group">
                                         <label for="profile_photo">Upload Profile Photo</label>
                                         <input type="file" class="form-control-file" id="profile_photo" name="profile_photo">
                                     </div>
                                     <button type="submit" class="btn btn-primary">Upload Photo</button>
                                 </form>
                                 
                                 
                                 <div class="text-center">
                                     <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-circle" width="150">
                                     <h2 class="mt-3">{{ $user->name }}</h2>
                                     <p class="text-muted">{{ $user->email }}</p>
                                 </div>
                                 
                             <hr>
         
                             <h3>Profile Information</h3>
                             <ul class="list-group">
                                 <li class="list-group-item">Email: {{ $user->email }}</li>
                                 <li class="list-group-item">Phone: {{ $user->phone }}</li>
                                 <li class="list-group-item">Address: {{ $user->address }}</li>
                                 <li class="list-group-item">Role: {{ $user->role }}</li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
         <!-- end slider section -->
      </div>
  
   
      @include ('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
   
      </div>    
   </div>
</div>
   <div id="chatify-popup">
      <div id="resize-handle"></div>
      <button id="toggle-chatify">Open Chat</button>
      
      <div id="chatify-iframe-container">
          <iframe src="http://127.0.0.1:8000/chatify"></iframe>
          <button id="close-chatify">Close</button>
          
      </div>
   </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script>
         window.addEventListener('load', function () {
            // Get the page container element
            const pageContainer = document.querySelector('.page-transition');
      
            // Add the 'active' class to trigger the transition
            pageContainer.classList.add('active');
         });
      </script>
      <script>
         const chatifyPopup = document.getElementById('chatify-popup');
      const toggleChatifyButton = document.getElementById('toggle-chatify');
      const chatifyIframeContainer = document.getElementById('chatify-iframe-container');
      const closeChatifyButton = document.getElementById('close-chatify');
      const resizeHandle = document.getElementById('resize-handle');
      
      toggleChatifyButton.addEventListener('click', () => {
          toggleChatify();
      });
      
      closeChatifyButton.addEventListener('click', () => {
          toggleChatify();
      });
      
      function toggleChatify() {
          if (chatifyIframeContainer.style.display === 'block') {
              chatifyIframeContainer.style.display = 'none';
          } else {
              chatifyIframeContainer.style.display = 'block';
          }
      }
      
      let isResizing = false;
      const maxPopupHeight = 500; // Adjust this value as needed
      
      resizeHandle.addEventListener('mousedown', (e) => {
          isResizing = true;
          const startY = e.clientY;
          const startHeight = chatifyIframeContainer.clientHeight;
      
          document.addEventListener('mousemove', resize);
          document.addEventListener('mouseup', stopResize);
      
          function resize(e) {
              if (!isResizing) return;
              const deltaY = e.clientY - startY;
              let newHeight = startHeight + deltaY;
      
              // Limit the height to the maximum allowed height
              if (newHeight > maxPopupHeight) {
                  newHeight = maxPopupHeight;
              }
      
              chatifyIframeContainer.style.height = newHeight + 'px';
          }
      
          function stopResize() {
              isResizing = false;
              document.removeEventListener('mousemove', resize);
              document.removeEventListener('mouseup', stopResize);
          }
      });
      
         </script>
   </body>
</html>