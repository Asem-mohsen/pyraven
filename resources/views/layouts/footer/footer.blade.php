<footer class="footer footer-style-4">
    <div class="container">
      <div class="widget-wrapper">
        <div class="row align-items-center">
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
              <div class="logo">
                <a href="{{ route('home') }}"> <img src="{{ asset('assets/img/logo/blue-logo-transparent.png') }}" alt="Pyraven Software Company"> </a>
              </div>
              <p class="desc">Pyraven is your trusted partner in custom web and mobile app development. We build scalable, innovative solutions that drive business growth and deliver exceptional user experiences.</p>
              <ul class="socials">
                <li> <a href="{{ config('app.social_media.facebook_url') }}" target="_blank"> <i class="lni lni-facebook-filled"></i> </a> </li>
                <li> <a href="{{ config('app.social_media.instagram_url') }}" target="_blank"> <i class="lni lni-instagram-filled"></i> </a> </li>
                <li> <a href="{{ config('app.social_media.linkedin_url') }}" target="_blank"> <i class="lni lni-linkedin-original"></i> </a> </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6 col-sm-6">
            <div class="footer-widget wow fadeInUp" data-wow-delay=".3s">
              <h6>Quick Link</h6>
              <ul class="links">
                <li> <a href="{{ route('home') }}">Home</a> </li>
                <li> <a href="#about">About</a> </li>
                <li> <a href="#feature">Service</a> </li>
                {{-- <li> <a href="#testimonial">Testimonial</a> </li> --}}
                <li> <a href="#contact">Contact</a> </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="footer-widget wow fadeInUp" data-wow-delay=".4s">
              <h6>Services</h6>
              <ul class="links">
                <li> <a href="#feature">Web Design</a> </li>
                <li> <a href="#feature">Web Development</a> </li>
                <li> <a href="#feature">Seo Optimization</a> </li>
                <li> <a href="#feature">Blog Writing</a> </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="footer-widget wow fadeInUp" data-wow-delay=".5s">
              <h6>Get In Touch</h6>
              <ul class="links">
                <li>
                  <a href="mailto:{{ config('app.email') }}">
                    <i class="lni lni-envelope"></i> {{ config('app.email') }}
                  </a>
                </li>
                <li>
                  <a href="tel:{{ config('app.phone') }}">
                    <i class="lni lni-phone"></i> {{ config('app.phone') }}
                  </a>
                </li>
                <li>
                  <a href="{{ route('home') }}#contact">
                    <i class="lni lni-map-marker"></i> Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright-wrapper wow fadeInUp" data-wow-delay=".2s">
        <p>All rights reserved by <a href="{{ route('home') }}" rel="nofollow" target="_blank">{{ config('app.name') }}</a></p>
      </div>
    </div>
</footer>

<!-- ========================= scroll-top start ========================= -->
<a href="#" class="scroll-top"> <i class="lni lni-chevron-up"></i> </a>
<!-- ========================= scroll-top end ========================= -->


<script src="{{ asset('assets/js/bootstrap-5.0.0-beta1.min.js') }}"></script>
<script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>