<!DOCTYPE html>
<html>
   <head>
      <style>
        .page-transition {
         transform: translateX(-100%);
         opacity: 0;
         transition: transform 1.0s ease, opacity 1.0s ease; /* Increased duration to 1 second */
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
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         
      
         <!-- end slider section -->
          
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      
     
      <!-- end client section -->
      <!-- footer start -->
      @include ('home.footer')
      <!-- footer end -->
      <div class="cpy_">
        
         
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
      
   </body>
   
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
         <script>
            window.addEventListener('load', function () {
               // Get the page container element
               const pageContainer = document.querySelector('.page-transition');
         
               // Add the 'active' class to trigger the transition
               pageContainer.classList.add('active');
            });
         </script>
</html>