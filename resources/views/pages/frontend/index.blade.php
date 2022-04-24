<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AMMIGS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/frontend/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/frontend/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  <!-- Template Main CSS File -->
  <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Groovin - v4.7.1
  * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">


      <h1 class="logo"><a href="{{route('index')}}"><img src="{{asset('assets/images/logo/'.$setting['logo'])}}"></a></h1>

        <div class="btn-group mb-1">
            <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (App::getLocale() == 'ar')
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                @else
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                @endif
            </button>
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </div>


        <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">{{trans('site.Home')}}</a></li>
          <li><a class="nav-link scrollto" href="#about">{{trans('site.AboutUs')}}</a></li>
          <li><a class="nav-link scrollto" href="#hero1">{{trans('site.Products')}}</a></li>
          <li><a class="nav-link scrollto" href="#contact">{{trans('site.ContactUs')}}</a></li>
{{--          <li><a class="getstarted scrollto" href="{{route('getLogin')}}">{{trans('site.Login')}}</a></li>--}}


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">




        @foreach($covers as $cover)

                <!-- Slide 1 -->
                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}" style="background-image: url({{asset('assets/images/cover/'.$cover->image)}});">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">{{$cover->title}}</h2>
                                <p class="animate__animated animate__fadeInUp">{!! $cover->description !!}</p>
                                <div>
                                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto"><strong>{{trans('site.Start')}}</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>


                @endforeach


        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <img src="{{asset('assets/images/about/'.$about->image)}}" width="500" height="500" class="col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start">
          <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
            <div class="content d-flex flex-column justify-content-center">
              <h1>{{trans('site.AboutUs')}}</h1>
                <br>
              <h5>
                  {!! $about->about !!}
              </h5>

            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->



 <!-- ======= Hero Section ======= -->
  <section id="hero1">
    <div class="hero1-container">
      <div id="hero1Carousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero1-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->

            @foreach($products as $product)

                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}" style="background-image: url({{asset('assets/images/products/'.$product->image)}});">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">{{$product->name}}</h2>
                            <p class="animate__animated animate__fadeInUp">{!! $product->description !!}</p>
                            <div class="d-flex mt-4 ">
                                <div class="app-store">
                                    <a  target="_blank" href="{{$product->app_store_link}}"><img src="{{asset('assets/images/app.png')}}" alt="" class="img-fluid"></a>
                                </div>
                                <div class="google-play">
                                    <a  target="_blank" href="{{$product->google_play_link}} "><img src="{{asset('assets/images/playstore.png')}}" alt="" class="img-fluid ms-3"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

        <a class="carousel-control-prev" href="#hero1Carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero1Carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->



      <section id="faq" class="faq section-bg">
          <div class="container">

              <div class="section-title">
                  <h2>{{trans('dashboard.Privacy_Policy')}}</h2>
              </div>

              <div class="faq-list">
                  <ul>

                      <li data-aos="fade-up" data-aos-delay="100">
                          <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">{{trans('dashboard.Privacy')}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                          <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                              <br>
                              <h6>
                                  {{$service->service}}
                              </h6>
                          </div>
                      </li>


                  </ul>
              </div>

          </div>
      </section>

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>{{trans('site.ContactUs')}}</h2>
          <p>{{$contacts->contact_description}}</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>{{trans('site.Address')}}</h3>
              <address>{{$contacts->address}}</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>{{trans('site.phoneNumber')}}</h3>
              <p><a href="tel:{{$contacts->phone}}">{{$contacts->phone}}</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>{{trans('site.Email')}}</h3>
              <p><a href="mailto:{{$contacts->email}}">{{$contacts->email}}</a></p>
            </div>
          </div>

        </div>



      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6">
            <div class="footer-info">
              <h3>{{$setting['company_name']}}</h3>
              <p>
                  {{$setting['address']}} <br>
                <strong>Phone:</strong> {{$setting['phone']}}<br>
                <strong>Email:</strong> {{$setting['company_email']}}<br>
              </p>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">{{trans('site.Home')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">{{trans('site.AboutUs')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero1">{{trans('site.Products')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">{{trans('site.Email')}}</a></li>

            </ul>
          </div>





        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{$setting['company_name']}}</span></strong>. {{trans('site.All_Rights_Reserved')}}
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/groovin-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/frontend/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/php-email-form/validate.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('assets/frontend/js/main.js')}}"></script>

</body>

</html>
