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

.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; 
}


.col-sm-6.col-md-4.col-lg-4 {
    flex: 0 0 calc(33.33% - 20px); 
    margin: 10px; 
    min-width: 300px;
}


</style>
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             For<span> sale</span>
          </h2>
           
          <form action="{{ route('filter.products') }}" method="GET" id="locationFilterForm">
            <label for="locationFilter">Filter:</label>
            <select name="locationFilter" id="locationFilter" class="form-control">
                <option value="">All Locations</option>
                @foreach($place as $place)
                    <option value="{{ $place->location }}">{{ $place->location }}</option>
                @endforeach
            </select>
        </form>
        
       
        
          
          
          </select>
          
       <div class="row">
          <div id="productsContainer"> 
        <div class="row product-container">
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
                     {{$products->location}} 
                   </h6>
                   <h6 style="color:red;">
                     ₱{{$products->price}}
                   </h6>
                   
                </div>
             </div>
          </div>
          @endforeach
        </div>
        </div>
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
   <script>
    
    document.getElementById('locationFilter').addEventListener('change', function () {
        
        document.getElementById('locationFilterForm').submit();
    });
</script>
 </section>