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
             .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color:black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 300px;
        }
        .div_design{
            padding-bottom:20px;
        }
        .form-container {
        text-align: center; 
        max-width: 600px; 
        margin: 0 auto; 
        padding: 20px; 
        background-color: #f7f7f7; 
        border: 1px solid #ddd; 
        border-radius: 10px; 
    }

    .form-container label,
    .form-container input,
    .form-container select,
    .form-container button {
        display: block;
        margin-bottom: 10px;
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
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   </head>
   <body>
    <div data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear">
      <div class="hero_area">
         <!-- header section strats -->
         @include ('home.seller_header')
         <!-- end header section -->
         <!-- slider section -->
     
         <!-- end slider section -->
      
      <!-- why section -->
      <div class="form-container">
      <div class="main-panel">
         <div class="content-wrapper">
             @if(session()->has('message'))
             
             <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> x</button>
                 {{session()->get('message')}}
             </div>
                 @endif
             <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                 @csrf
             <div class="div_center">
                 <h1 class="font_size"> Products</h1>

                 
                 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                 <div class="div_design">
                 <label for="">Name:</label>
                 <input class="text_color" type="text" name="title" placeholder="Write a title" required="">
             </div>
             <div class="div_design">
                 <label for="">Description:</label>
                 <input class="text_color" type="text" name="description" placeholder="Write a description" required="">
             </div>
             
             <div class="div_design">
                 <label for="">Price:</label>
                 <input class="text_color" type="number" name="price" placeholder="Write the price" required="">
             </div>
             
             <div class="div_design">
                <label for="location">Location:</label>
                <select class="text_color" name="location" id="location" required>
                    <option value="" disabled selected>Select a location</option>
                    @foreach($places as $place)
                        <option value="{{ $place->location }}">{{ $place->location }}</option>
                    @endforeach
                </select>
            </div>
            
            
             
             <div class="div_design">
                 <label for="">Category:</label>
                 <select class="text_color" name="category" id="" required="">
                     <option value =" " selected= " ">Add a Category</option>
                     @foreach ($category as $category)
                     <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                     @endforeach
                 </select>
             </div>
             
             <div class="div_design">
                 <label for="">Property Type:</label>
                 <input class="text_color" type="text" name="property_type" placeholder="Write a property type" required="">
             </div>
             <div class="div_design">
                 <label for="">Lot Area:</label>
                 <input class="text_color" type="text" name="lot_area" placeholder="Write a lot area" required="">
             </div>
             <div class="div_design">
                 <label for="">Product Image:</label>
                 <input type="file" name="image" required="">
             </div>

             <div class="div_design">
                 
                 <input type="submit" value="Add Product" class="btn btn-primary">
             </div>
             </div>
         </form>
         </div>
      </div>
   </div>
</div>
             
<div data-aos="fade-up"
data-aos-anchor-placement="center-bottom">
      @include ('home.footer')
     
      <div class="cpy_">
        
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
         document.getElementById('role').addEventListener('click', function () {
             window.alert('Please re-login for becoming a buyer');
         });
     
         document.getElementById('role').addEventListener('change', function () {
             if (this.value === 'seller') {
                 document.getElementById('roleForm').submit();
             }
         });
     </script>
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
   
   </body>
</html>