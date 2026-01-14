@extends('layouts.master')

@section('content')
    <!-- ========================= hero-section-wrapper-5 start ========================= -->
    <section id="home" class="hero-section-wrapper-5">

      @include('layouts.navbar.navbar')

      <!-- ========================= hero-5 start ========================= -->
      <div class="hero-section hero-style-5 img-bg" style="background-image: url('{{ asset('assets/img/hero/hero-5/hero-bg.svg') }}')">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="hero-content-wrapper">
                <h2 class="mb-30 wow fadeInUp" data-wow-delay=".2s">Transform Your Ideas Into Digital Reality</h2>
                <p class="mb-30 wow fadeInUp" data-wow-delay=".4s">Pyraven is your trusted partner in custom web and mobile app development. We build scalable, innovative solutions that drive business growth and deliver exceptional user experiences.</p>
                <a href="#contact" class="button button-lg radius-50 wow fadeInUp" data-wow-delay=".6s">Get Started <i class="lni lni-chevron-right"></i> </a>
              </div>
            </div>
            <div class="col-lg-6 align-self-end">
              <div class="hero-image wow fadeInUp" data-wow-delay=".5s">
                <img src="{{ asset('assets/img/hero/hero-5/hero-img.png') }}" alt="At Pyraven, we build scalable, innovative solutions that drive business growth">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ========================= hero-5 end ========================= -->

    </section>
    <!-- ========================= hero-section-wrapper-6 end ========================= -->

    <!-- ========================= feature style-5 start ========================= -->
    <section id="feature" class="feature-section feature-style-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-8">
            <div class="section-title text-center mb-60">
              <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Our Services</h3>
              <p class="wow fadeInUp" data-wow-delay=".4s">We provide comprehensive software development services tailored to meet your business needs and deliver exceptional digital experiences.</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
              <div class="icon">
                <i class="lni lni-code-alt"></i>
                <svg width="110" height="72" viewBox="0 0 110 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M110 54.7589C110 85.0014 85.3757 66.2583 55 66.2583C24.6243 66.2583 0 85.0014 0 54.7589C0 24.5164 24.6243 0 55 0C85.3757 0 110 24.5164 110 54.7589Z" fill="#EBF4FF"/>
                  </svg>                  
              </div>
              <div class="content">
                <h5>Web Development</h5>
                <p>Custom websites and web applications built with modern technologies like Laravel, React, and Vue.js.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
              <div class="icon">
                <i class="lni lni-mobile"></i>
                <svg width="110" height="72" viewBox="0 0 110 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M110 54.7589C110 85.0014 85.3757 66.2583 55 66.2583C24.6243 66.2583 0 85.0014 0 54.7589C0 24.5164 24.6243 0 55 0C85.3757 0 110 24.5164 110 54.7589Z" fill="#EBF4FF"/>
                  </svg> 
              </div>
              <div class="content">
                <h5>Mobile App Development</h5>
                <p>Native and cross-platform mobile applications for iOS and Android using Flutter and React Native.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
              <div class="icon">
                <i class="lni lni-vector"></i>
                <svg width="110" height="72" viewBox="0 0 110 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M110 54.7589C110 85.0014 85.3757 66.2583 55 66.2583C24.6243 66.2583 0 85.0014 0 54.7589C0 24.5164 24.6243 0 55 0C85.3757 0 110 24.5164 110 54.7589Z" fill="#EBF4FF"/>
                  </svg> 
              </div>
              <div class="content">
                <h5>UI/UX Design</h5>
                <p>Beautiful, intuitive interfaces designed to provide exceptional user experiences and drive engagement.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
              <div class="icon">
                <i class="lni lni-cloud-network"></i>
                <svg width="110" height="72" viewBox="0 0 110 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M110 54.7589C110 85.0014 85.3757 66.2583 55 66.2583C24.6243 66.2583 0 85.0014 0 54.7589C0 24.5164 24.6243 0 55 0C85.3757 0 110 24.5164 110 54.7589Z" fill="#EBF4FF"/>
                  </svg> 
              </div>
              <div class="content">
                <h5>Cloud Solutions</h5>
                <p>Scalable cloud infrastructure and deployment solutions using AWS, Azure, and Google Cloud.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
              <div class="icon">
                <i class="lni lni-database"></i>
                <svg width="110" height="72" viewBox="0 0 110 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M110 54.7589C110 85.0014 85.3757 66.2583 55 66.2583C24.6243 66.2583 0 85.0014 0 54.7589C0 24.5164 24.6243 0 55 0C85.3757 0 110 24.5164 110 54.7589Z" fill="#EBF4FF"/>
                  </svg> 
              </div>
              <div class="content">
                <h5>API Development</h5>
                <p>Robust RESTful APIs and integrations to connect your systems and third-party services seamlessly.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
              <div class="icon">
                <i class="lni lni-cog"></i>
                <svg width="110" height="72" viewBox="0 0 110 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M110 54.7589C110 85.0014 85.3757 66.2583 55 66.2583C24.6243 66.2583 0 85.0014 0 54.7589C0 24.5164 24.6243 0 55 0C85.3757 0 110 24.5164 110 54.7589Z" fill="#EBF4FF"/>
                  </svg> 
              </div>
              <div class="content">
                <h5>Maintenance & Support</h5>
                <p>Ongoing maintenance, updates, and technical support to keep your applications running smoothly.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- ========================= feature style-5 end ========================= -->

    <!-- ========================= about style-4 start ========================= -->
    <section id="about" class="about-section about-style-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-5 col-lg-6">
            <div class="about-content-wrapper">
              <div class="section-title mb-30">
                <h3 class="mb-25 wow fadeInUp" data-wow-delay=".2s">Why Choose Pyraven?</h3>
                <p class="wow fadeInUp" data-wow-delay=".3s">We are a passionate team of developers, designers, and tech enthusiasts dedicated to building cutting-edge software solutions that empower businesses to thrive in the digital age.</p>
              </div>
              <ul>
                <li class="wow fadeInUp" data-wow-delay=".35s">
                  <i class="lni lni-checkmark-circle"></i>
                  Expert team with 10+ years of combined experience in software development.
                </li>
                <li class="wow fadeInUp" data-wow-delay=".4s">
                  <i class="lni lni-checkmark-circle"></i>
                  Agile development methodology ensuring timely delivery and flexibility.
                </li>
                <li class="wow fadeInUp" data-wow-delay=".45s">
                  <i class="lni lni-checkmark-circle"></i>
                  100% client satisfaction with ongoing support and maintenance services.
                </li>
              </ul>
              <a href="#contact" class="button button-lg radius-10 wow fadeInUp" data-wow-delay=".5s">Start Your Project</a>
            </div>
          </div>
          <div class="col-xl-7 col-lg-6">
            <div class="about-image text-lg-right wow fadeInUp" data-wow-delay=".5s">
              <img src="{{ asset('assets/img/about/about-4/about-img.svg') }}" alt="Meet our passionate team of developers, designers, and tech enthusiasts dedicated to building cutting-edge software solutions that empower businesses to thrive in the digital age.">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================= about style-4 end ========================= -->

    <!-- ========================= projects section start ========================= -->
    @if($projects->count() > 0)
      <section id="projects" class="portfolio-section portfolio-style-2">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-8">
              <div class="section-title text-center mb-60">
                <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Our Projects</h3>
                <p class="wow fadeInUp" data-wow-delay=".4s">Explore our portfolio of successful projects that showcase our expertise in delivering cutting-edge digital solutions.</p>
              </div>
            </div>
          </div>
          
          <div class="row">
            @foreach($projects as $index => $project)
            <div class="col-lg-4 col-md-6">
              <div class="single-portfolio wow fadeInUp" data-wow-delay="{{ 0.2 + ($index * 0.1) }}s">
                <div class="portfolio-image">
                  @if($project->hasMedia('project_media'))
                  <a href="{{ $project->url }}" target="_blank">
                    <img src="{{ $project->getFirstMediaUrl('project_media') }}" alt="{{ $project->name }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                  </a>
                  @else
                    <div style="width: 100%; height: 250px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                      <i class="lni lni-code-alt" style="font-size: 64px; color: white; opacity: 0.8;"></i>
                    </div>
                  @endif
                </div>
               <div class="portfolio-content mt-20">
                <a href="{{ $project->url }}" target="_blank">
                  <h5 class="mb-10">{{ $project->name }}</h5>
                </a>
                 <p class="mb-15">{{ Str::limit(strip_tags($project->description), 120) }}</p>
                 @if($project->specifications && is_array($project->specifications) && count($project->specifications) > 0)
                   <div class="tags mt-3">
                     @foreach(array_slice($project->specifications, 0, 4) as $key => $value)
                       <span class="badge" style="background-color: #667eea; color: white; padding: 5px 12px; border-radius: 20px; margin-right: 8px; margin-bottom: 8px; font-size: 11px; display: inline-block;">
                         <strong>{{ $key }}:</strong> {{ $value }}
                       </span>
                     @endforeach
                   </div>
                 @endif
               </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
    @endif
    <!-- ========================= projects section end ========================= -->

    <!-- ========================= contact-style-3 start ========================= -->
    <section id="contact" class="contact-section contact-style-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
            <div class="section-title text-center mb-50">
              <h3 class="mb-15">Let's Build Something Amazing Together</h3>
              <p>Have a project in mind? Get in touch with us and let's discuss how we can help bring your vision to life with our expertise in web and mobile development.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="contact-form-wrapper">
              @if(session('success'))
                <div class="alert alert-success mb-4" style="padding: 15px; background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; color: #155724;">
                  {{ session('success') }}
                </div>
              @endif
              <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="single-input">
                      <input type="text" id="name" name="name" class="form-input" placeholder="Name" required>
                      <i class="lni lni-user"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="single-input">
                      <input type="email" id="email" name="email" class="form-input" placeholder="Email" required>
                      <i class="lni lni-envelope"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="single-input">
                      <input type="text" id="phone" name="phone" class="form-input" placeholder="Phone Number">
                      <i class="lni lni-phone"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="single-input">
                      <input type="text" id="subject" name="subject" class="form-input" placeholder="Subject">
                      <i class="lni lni-text-format"></i>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="single-input">
                      <textarea name="message" id="message" class="form-input" placeholder="Message" rows="6" required></textarea>
                      <i class="lni lni-comments-alt"></i>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-button">
                      <button type="submit" class="button"> <i class="lni lni-telegram-original"></i> Send Message</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>

          <div class="col-lg-4">
            <div class="left-wrapper">
              <div class="row">
                <div class="col-lg-12 col-md-6">
                  <div class="single-item">
                    <div class="icon">
                      <i class="lni lni-phone"></i>
                    </div>
                    <div class="text">
                      <a href="tel:{{ config('app.phone') }}">
                        {{ config('app.phone') }}
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-md-6">
                  <div class="single-item">
                    <div class="icon">
                      <i class="lni lni-envelope"></i>
                    </div>
                    <div class="text">
                      <a href="mailto:{{ config('app.email') }}">
                        {{ config('app.email') }}
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-md-6">
                  <div class="single-item">
                    <div class="icon">
                      <i class="lni lni-map-marker"></i>
                    </div>
                    <div class="text">
                      <p>Cairo, Egypt</p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================= contact-style-3 end ========================= -->

    <!-- ========================= clients-logo start ========================= -->
    @if($projects->count() > 0)
      <section class="clients-logo-section pt-100 pb-100">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12">
              <div class="section-title text-center mb-50">
                <h4 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Trusted by Leading Brands</h4>
              </div>
            </div>
          </div>
          <div class="row align-items-center justify-content-center">
            @foreach($projects as $index => $project)
              <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                <div class="client-logo wow fadeInUp text-center" data-wow-delay="{{ 0.1 + ($index * 0.05) }}s" style="padding: 15px;">
                  @if($project->hasMedia('project_logo'))
                    <a href="{{ $project->url }}" target="_blank">
                      <img src="{{ $project->getFirstMediaUrl('project_logo') }}" 
                          alt="{{ $project->name }}" 
                          title="{{ $project->name }}"
                          style="max-width: 120px; max-height: 80px; object-fit: contain; filter: grayscale(100%); opacity: 0.6; transition: all 0.3s ease;"
                          onmouseover="this.style.filter='grayscale(0%)'; this.style.opacity='1';"
                          onmouseout="this.style.filter='grayscale(100%)'; this.style.opacity='0.6';">
                    </a>
                  @else
                    <div style="width: 120px; height: 80px; background-color: #f5f5f5; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                      <span style="font-size: 12px; color: #999; text-align: center; padding: 10px;">{{ Str::limit($project->name, 20) }}</span>
                    </div>
                  @endif
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    @endif
    <!-- ========================= clients-logo end ========================= -->
@endsection
