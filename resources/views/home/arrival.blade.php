<section class="arrival_section" style="background-color: #ccc; padding: 40px 0;">
   <div class="container">
       <div class="box">
           <div class="row">
               <div class="col-md-6 mx-auto text-center">
                   <h2>Negotiate now for Inquiries!</h2>
                   <p style="margin-top: 20px; margin-bottom: 30px;">
                       Send your Name, Email, Phone Number, Purpose, Budget Range, Land Size Required, Land Name, Supporting Documents on Inquiries.
                   </p>
                   @auth
                   <a href="{{ url('/inquiry_page') }}" class="btn btn-primary">Inquire</a>
                   @else
                   <a href="{{ route('login') }}" class="btn btn-primary">Login to Inquire</a>
                   @endauth
               </div>
           </div>
       </div>
   </div>
</section>
