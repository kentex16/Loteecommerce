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
    height: 10px; 
    background-color: #007BFF; 
    cursor: ns-resize; 
    position: absolute;
    top: 0;
    left: 0;
}
.inquiry-container {
    display: flex;
    flex-wrap: column;
    align-items: flex-start
}
.inquiry-drawer {
    width: 400px;
    width: 100%;    
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-sizing: border-box;
    cursor: pointer;
}
.inquiry-title {
    margin: 0;
    font-weight: bold;
    padding: 5px;
    background-color: #ff0000;
    color: #fff;
    border-radius: 5px 5px 0 0;
}
.inquiry-content {
    display: none;
    padding: 10px;
    border-top: 1px solid #ccc;
}

.inquiry-form {
    width: calc(50% - 10px);    
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-sizing: border-box;
}

.inquiry-form label {
    font-weight: bold;
}


.inquiry-form input[type="text"],
.inquiry-form input[type="email"],
.inquiry-form input[type="tel"] {
    width: 100%;
    padding: 5px;
    margin-bottom: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
}

.inquiry-form a {
    text-decoration: none;
    color: #007bff;
}

.inquiry-form a:hover {
    text-decoration: underline;
    color: #0056b3;
}

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
                   Product <span> Inquiries </span>
                </h2>
             </div>
            <div class="inquiry-container">
                @foreach($inquire as $key => $inquiry)
                <div class="inquiry-drawer">
                    <h4 class="inquiry-title">Inquiry #{{ $key + 1 }}</h4>
                    <div class="inquiry-content">
                        <form>  
                    <div class="form-group">
                        <label for="productTitle">Product Title:</label>
                        <input type="text" class="form-control" id="productTitle" value="{{ $inquiry->product_id ? $inquiry->product->title : 'No Product Associated' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inquirerName">Inquirer Name:</label>
                        <input type="text" class="form-control" id="inquirerName" value="{{ $inquiry->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="{{ $inquiry->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" class="form-control" id="phone" value="{{ $inquiry->phone }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose:</label>
                        <input type="text" class="form-control" id="purpose" value="{{ $inquiry->purpose }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="budget">Budget Range:</label>
                        <input type="text" class="form-control" id="budget" value="{{ $inquiry->budget }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="landSize">Land Size Required:</label>
                        <input type="text" class="form-control" id="landSize" value="{{ $inquiry->contactmethod }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="file">File:</label>
                        @if ($inquiry->file)
                            <a href="{{ asset('storage/app/pdfs' . $inquiry->file) }}" download>{{ basename($inquiry->file) }}</a>
                        @else
                            No file
                        @endif
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
        
      
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
  <script>
    
document.addEventListener("DOMContentLoaded", function () {
    const inquiryDrawers = document.querySelectorAll(".inquiry-drawer");

    inquiryDrawers.forEach((drawer) => {
        const title = drawer.querySelector(".inquiry-title");
        const content = drawer.querySelector(".inquiry-content");

        title.addEventListener("click", function () {
            content.style.display = content.style.display === "block" ? "none" : "block";
        });
    });
});

  </script>
   </body>
</html>