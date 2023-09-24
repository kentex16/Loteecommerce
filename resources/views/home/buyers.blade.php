<!DOCTYPE html>
<html>
   <head>
      <style>
         
        .small-button{
            font-size: 10px;
        }
        .select-button{
            margin-left: 10px;
            padding: 4px 28px;
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
.product-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Adjust the gap between product boxes as needed */
}

.product-box {
    border: 1px solid #ccc;
    padding: 20px;
    width: calc(5% - 10px);
    box-sizing: border-box;
    transition: all 0.3s ease;
}

.product-image img {
    max-width: 100%;
    height: auto;
}

.product-title {
    font-size: 18px;
    margin: 0;
}

.product-location {
    font-style: italic;
    margin: 5px 0;
}
.product-box {
    border: 1px solid #ccc;
    padding: 20px;
    width: calc(33.33% - 20px);
    box-sizing: border-box;
    transition: all 0.3s ease; 
}

.product-box:hover {
    background: var(--color);
    color: #050801;
    box-shadow: 0 0 5px var(--color),
                0 0 25px var(--color),
                0 0 50px var(--color),
                0 0 200px var(--color);

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
      <div class="hero_area">
         <!-- header section strats -->
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
                 
                </ul>
                
             </div>
          </nav>
       </div>
    </header>
         <!-- end header section -->
         <!-- slider section -->
         
         <div class="col-sm-12">
            <div class="heading_container heading_center">
                <h2>
                   My<span> Listed Products</span>
                </h2>
             </div>
            <div class="product-list">
                
                @foreach($products as $product)
                <div class="product-box">
                    <div class="product-image">
                        <img src="product/{{$product->image}}" alt="{{$product->title}}">
                    </div>
                    <div class="product-details">
                        <h3 class="product-title">{{$product->title}}</h3>
                        <p class="product-location">{{$product->location}}</p>
                        <p class="product-seller">Seller: Me</p>
                        <p class="product-lot-area">Lot Area (SQM): {{$product->lot_area}}</p>
                        <p class="product-price">Price: ₱{{$product->price}}</p>
                        <p class="product-description">{{$product->description}}</p>
                        <p class="product-category">Category: {{$product->category}}</p>
                        <p class="product-property-type">Property Type: {{$product->property_type}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        
        

         <!-- end slider section -->
      </div>
      <!-- why section -->
    
      @include ('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      
      <!-- Include your custom JavaScript here -->
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
  <script>
      // Add an event listener to the role select element
      document.getElementById('role').addEventListener('change', function() {
          if (this.value === 'seller') {
              // If "Seller" is selected, show the dialog
              document.getElementById('dialog').style.display = 'block';
          } else {
              // If "Buyer" is selected, hide the dialog
              document.getElementById('dialog').style.display = 'none';
          }
      });
  </script>
   </body>
</html>