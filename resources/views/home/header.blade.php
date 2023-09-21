<style>
      .small-button{
            font-size: 10px;
        }
        .select-button{
            margin-left: 5px;
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

</style>
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
                   <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{url('/view_products')}}">INQUIRE</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/') }}">Message</a>
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
                          <option value="buyer">Buyer</option>
                          <option value="seller" selected disabled>Seller</option>
                      @endif
                  </select>
                  <button class="small-button" type="submit">Update Role</button>
              </form>
              
              <div id="chatify-popup">
                <div id="resize-handle"></div>
                <button id="toggle-chatify">Open Chat</button>
                
                <div id="chatify-iframe-container">
                    <iframe src="http://127.0.0.1:8000/chatify"></iframe>
                    <button id="close-chatify">Close</button>
                    
                </div>
                
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

               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-bell"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @if (session('message'))
                            <li>
                                <a href="">{{ session('message') }}</a>
                            </li>
                        @endif
                        <li>
                            <a href="">To be fixed soon</a>
                        </li>
                    </ul>
                </li>
                
              
              
              
             </ul>
          </div>
       </nav>
    </div>
    <!-- jQuery -->
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
   
 </header>