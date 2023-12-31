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
    display: none; 
    background-color: #fff;
    border: 1px solid #ccc;
    border-top: none;
    border-radius: 0 0 5px 5px;
    max-height: 400px; 
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
    height: 10px; 
    background-color: #007BFF; 
    cursor: ns-resize; 
    position: absolute;
    top: 0;
    left: 0;
}

.dropdown .dropdown-menu {
        min-width: 250px; 
        max-height: 300px; 
        overflow-y: auto; 
    }

    .dropdown .dropdown-menu li {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .dropdown .dropdown-menu li:last-child {
        border-bottom: none; 
    }

    .dropdown .dropdown-menu a {
        display: block;
        text-decoration: none;
        color: #333;
    }

    .dropdown .dropdown-menu a:hover {
        background-color: #f5f5f5; 
    }

    .dropdown .dropdown-toggle i {
        font-size: 18px; 
    }
    .navbar-brand img {
    width: 280px; 
    height: auto; 
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
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

   </head>
   <body>
    <div data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear">
      <div class="hero_area">
         <!-- header section strats -->
         <section id="home">
         @include ('home.seller_header')
         </section>
       <div data-aos="flip-left" data-aos-duration="600" data-aos-easing="linear">
         <!-- end header section -->
         <!-- slider section -->
         <section id="slider">
         @include ('home.slider')
         <!-- end slider section -->
         </section>
       </div>
      </div>
      <!-- why section -->
      <div data-aos="fade-right" data-aos-duration="600" data-aos-easing="linear">
        <section id="why">
      @include('home.why')
      </div>
    </section>
      <!-- end why section -->
      
      <!-- arrival section -->
      <div data-aos="fade-left" data-aos-duration="600" data-aos-easing="linear">
      @include('home.arrival')
      <!-- end arrival section -->
      </div>
      <!-- product section -->
   
      <!-- end product section -->
      <div data-aos="fade-right" data-aos-duration="600" data-aos-easing="linear">
      <!-- subscribe section -->
      @include ('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      </div>
      <div data-aos="fade-left" data-aos-duration="600" data-aos-easing="linear">
      @include ('home.client')
      <!-- end client section -->
      <!-- footer start -->
      </div>
      <div data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear">
      @include ('home.footer')
      <!-- footer end -->
      <div class="cpy_">
        
         
         </p>
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

        window.addEventListener('scroll', function () {
        
        AOS.refresh();
    });
    </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
         <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- Include your custom JavaScript here -->
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
       const scrollToTopLinks = document.querySelectorAll('a[href^="#"]');
       
       for (const link of scrollToTopLinks) {
          link.addEventListener('click', function (e) {
             e.preventDefault();
             const targetId = this.getAttribute('href').substring(1); // Remove the '#' character
             const targetElement = document.getElementById(targetId);
             
             if (targetElement) {
                window.scrollTo({
                   top: targetElement.offsetTop,
                   behavior: 'smooth', // Use smooth scrolling
                });
             }
          });
       }
    });
 </script>
 <script>
    // Use JavaScript to add the 'active' class to trigger the transition
    $(document).ready(function () {
        $('.page-transition').addClass('active');
    });
</script>
   </body>
</html>