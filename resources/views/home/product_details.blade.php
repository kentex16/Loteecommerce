<!DOCTYPE html>
<html>
   <head>
      <style>
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
            height: 100px;
        }
        #chatify-iframe-container.large {
            height: 400px; 
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
      </style>
      <!-- Basic -->
      <base href="/public">
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
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   </head>
   <body>
    <div data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear">
      <div class="hero_area">
         
        @include('home.header')
  



      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto;width:50%; padding:30px;">
           <div class="img-box">
              <img src="product/{{$product->image}}" alt="">
           </div>
           <div class="detail-box">
              <h5 style="font-size:30px;">
                <strong>{{$product->title}}</strong>
              </h5>
              <h5 style="font-size:30px;">Location:
                <strong>{{$product->location}}</strong>
              </h5>
             
              
              <p>Seller: {{ $product->seller->name }}</p>
             
              <h6 style="color:blue;">
                Lot Area:
                
                {{$product->lot_area}} SQM
              </h6>
              <h6 style="color:blue;">
                Price:
               
                ₱{{$product->price}}
                <h6>
                  <strong>  Description:
                  
                    {{$product->description}} </strong>
              </h6>
              <h6>
                <strong> Category:
               
                {{$product->category}} </strong>
          </h6>
          
          <h6 style="padding-bottom:20px;">
           <strong>Property Type:
            
            {{$product->property_type}}</strong> 
      </h6>
      <a href="{{ url('/inquiry_page') }}" class="btn btn-primary" id="inquire-button">
         Inquire
     </a>
     
     
     
          
           </div>
        </div>
     </div>
    </div>
    <div data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear">
      @include ('home.footer')
      
      <div class="cpy_">
        
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
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
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
         chatifyIframeContainer.style.height = maxPopupHeight + 'px'; // Set maximum height when opening
     }
 }

 const maxPopupHeight = 2000; // Adjust this value as needed

 </script>
   </body>
</html>