<footer class="footer footer-style-4">
    <div class="container">
      <div class="widget-wrapper">
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
              <div class="logo">
                <a href="{{ route('home') }}"> <img src="{{ asset('assets/img/logo/blue-logo-transparent.png') }}" alt="Pyraven Software Company"> </a>
              </div>
              <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Facilisis nulla placerat amet amet congue.</p>
              <ul class="socials">
                <li> <a href="#"> <i class="lni lni-facebook-filled"></i> </a> </li>
                <li> <a href="#"> <i class="lni lni-twitter-filled"></i> </a> </li>
                <li> <a href="#"> <i class="lni lni-instagram-filled"></i> </a> </li>
                <li> <a href="#"> <i class="lni lni-linkedin-original"></i> </a> </li>
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
                <li> <a href="#testimonial">Testimonial</a> </li>
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
              <h6>Download App</h6>
              <ul class="download-app">
                <li>
                  <a href="#0">
                    <span class="icon"><i class="lni lni-apple"></i></span>
                    <span class="text">Download on the <b>App Store</b> </span>
                  </a>
                </li>
                <li>
                  <a href="#0">
                    <span class="icon"><i class="lni lni-play-store"></i></span>
                    <span class="text">GET IT ON <b>Play Store</b> </span>
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