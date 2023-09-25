<footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="images/logo.png" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        Updated at: <span id="displayYear"></span>
                        <p><strong>ADDRESS:</strong> Tagaytay City, Cavite </p>
                        <p><strong>TELEPHONE:</strong> +639298527829</p>
                        <p><strong>EMAIL:</strong> kenneth.novero@cvsu.edu.ph</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="#home">Home</a></li>
                           <li><a href="#slider">About</a></li>
                           <li><a href="#why">Services</a></li>
                           <li><a href="#product">Products</a></li>
                           
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="{{ url('/view_profile') }}">Profile</a></li>
                           <li><a href="{{ url('/inquiry_page') }}">Inquire</a></li>
                           <li><a href="{{ url('/view_products') }}">Shopping</a></li>
                           
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>SUBSCRIBE</h3>
                        <div class="information_f">
                          <p>Subscribe by our website to determine the quantity of viewers.</p>
                        </div>
                        <div class="form_sub">
                           <form action="{{ route('subscribe') }}" method="POST">
                              @csrf
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Email" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>                           
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>

      </footer>