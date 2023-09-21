<style>
   
.pagination-slide {
    animation: slideIn 0.5s ease-in-out;
}

@keyframes slideIn {
    0% {
        transform: translateX(-20px);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

</style>
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             For<span> sale</span>
          </h2>
       </div>
       <div class="row">

         @foreach($product as $products)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                    @if (Auth::check())
                    <a href="{{ url('product_details', $products->id) }}" class="option1">
                        Details
                    </a>
                    <a href="{{ url('/inquiry_page') }}" class="option2">
                        Inquire Now
                    </a>
                @elseif (!Auth::check())
                    <a href="{{ route('login') }}" class="option1">
                        Login to View
                    </a>
    
                    <a href="{{ route('login') }}" class="option2">
                        Login to Inquire
                    </a>
                @endif
                
                   </div>
                </div>
                <div class="img-box">
                   <img src="product/{{$products->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{$products->title}}
                   </h5>
                   
                   <h6 style="color:green;">
                     {{$products->lot_area}} SQM
                   </h6>
                   <h6 style="color:red;">
                     ₱{{$products->price}}
                   </h6>
                   
                </div>
             </div>
          </div>
          @endforeach
          <div id="pagination-container">
            <span style="padding-top:20px;">
               {!! $product->withQueryString()->links('pagination::bootstrap-5')->with(['class' => 'pagination-slide']) !!}
   
            </span>
        </div>
        
         
       
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      function loadNextPage(url) {
          $.ajax({
              url: url,
              type: 'GET',
              success: function(data) {
                  $('#pagination-container').html(data);
              },
              error: function() {
                  alert('An error occurred while loading the next page.');
              }
          });
      }
  </script>
  
 </section>