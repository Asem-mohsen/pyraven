<!-- ========================= header-6 start ========================= -->
<header class="header header-6">
<div class="navbar-area">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo/blue-logo-transparent.png') }}" alt="Pyraven Software Company" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent6" aria-controls="navbarSupportedContent6" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent6">
            <ul id="nav6" class="navbar-nav ms-auto m-auto">
                <li class="nav-item">
                <a class="page-scroll active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                <a class="page-scroll" href="#feature">Feature</a>
                </li>
                <li class="nav-item">
                <a class="page-scroll" href="#about">About</a>
                </li>
                @if($projects->count() > 0)
                <li class="nav-item">
                    <a class="page-scroll" href="#projects">Projects</a>
                </li>
                @endif
                <li class="nav-item">
                <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
            </div>
            <div class="header-action d-flex">
            <a href="#contact" class="button w-150 text-white button-md radius-50 wow fadeInUp" data-wow-delay=".6s">Get Started <i class="lni lni-chevron-right"></i> </a>
            </div>
            <!-- navbar collapse -->
        </nav>
        <!-- navbar -->
        </div>
    </div>
    <!-- row -->
    </div>
    <!-- container -->
</div>
<!-- navbar area -->
</header>
<!-- ========================= header-6 end ========================= -->