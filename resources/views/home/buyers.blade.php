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
    .navbar-brand img {
    width: 280px; /* Adjust the width as needed */
    height: auto; /* Maintain aspect ratio */
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
         @include ('home.seller_header')
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
   </body>
</html>