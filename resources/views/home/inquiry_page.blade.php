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
        @include('home.header')
     
        <div class="form-container">
         <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> x</button>
                    {{session()->get('message')}}
                </div>
                    @endif
                <form action="{{url('/add_inquiry')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                <div class="div_center">
                    <h1 class="font_size"> Inquiry</h1>
   
                    
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
   
                    <div class="div_design">
                    <label for="">Name:</label>
                    <input class="text_color" type="text" name="name" placeholder="Write your name" required="">
                </div>
                <div class="div_design">
                    <label for="">Email:</label>
                    <input class="text_color" type="text" name="email" placeholder="Write your email" required="">
                </div>
                
                <div class="div_design">
                    <label for="">Phone Number:</label>
                    <input class="text_color" type="number" name="phone" placeholder="Write your Contact Number" required="">
                </div>
                
                <div class="div_design">
                    <label for="">Purpose:</label>
                    <input class="text_color" type="text" name="purpose" placeholder="Write the Inquiry Purpose" required="">
                </div>
                
                <div class="div_design">
                    <label for="">Budget Range:</label>
                    <input class="text_color" type="number" name="budget" placeholder="Write your Budget Range" required="">
                    </select>
                </div>
                
                <div class="div_design">
                    <label for="">Land Size Required:</label>
                    <input class="text_color" type="text" name="contactmethod" placeholder="Write a property type" required="">
                </div>

                <div class="div_design">
                    <label for="">Land Title:</label>
                    <select class="text_color" name="product_id" id="" required="">
                        <option value="" selected=" ">Choose the Land Name</option>
                        @foreach ($product as $product)
                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                        @endforeach
                    </select>
                </div>
                
                
                <div class="div_design">
                    <label for="">File Documents (PDF Supporting Files): </label>
                    <input type="file" class="form-control" name="file"  required="">
                </div>
                <div class="form-group">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="agree_to_terms" id="agree_to_terms" required>
                      <label class="form-check-label" for="agree_to_terms">
                          I agree to the Terms and Conditions
                      </label>
                  </div>
              </div>
              
              
   
                <div class="div_design">
                    
                    <input type="submit" value="Add Inquiry" class="btn btn-primary">
                </div>
            </form>
            </div>
         </div>
      </div>
   </div>
      </div>
      
    
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