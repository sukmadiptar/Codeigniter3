<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Ajar Uji | Teruji Mampu</title>

  <!-- Bootstrap core CSS -->

  <!-- Custom styles for this template -->

</head>

<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/animasi.css">
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/main.css">


<body>

  <!-- Navigation -->
  <section class="header_area">
        <div class="header_navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="<?= base_url('assets/img/'); ?>logo.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#fiturs">Fitur</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#uji">Uji Coba</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#tentang">Tentang Kami</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#berlangganan">Berlangganan</a>
                                    </li>
                                    <li class="navbar-btn my-0">
                                        <a class="main-btn2" href="http://ajaruji.com/login">Masuk</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header navbar -->


        <div id="home" class="header_slider">
            <div class="single_slider d-flex align-items-center" style="background-color: #494FCA;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="slider_content">
                                <h4 class="slider_title wow fadeInUp" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    Platform Sekolah Online <br>
                                    yang Menyenangkan</h4>
                                <p class="slider_slogan wow fadeInDown mt-4" data-wow-duration="1.3s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.5s; animation-name: fadeInDown;">Belajar lebih mudah, kapanpun, dimanapun <br>
                                    Mudah dijangkau hingga kepelosok negeri.</p>
                                <a href="http://ajaruji.com/register" rel="" class="main-btn wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.8s" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.8s; animation-name: fadeInLeftBig;">Mulai Belajar</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="hero-image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.8s" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.8s; animation-name: fadeInRightBig;">
                                <img src="<?= base_url('assets/img/'); ?>Illustration.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Welcome to Scrolling Nav</h1>
      <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About this page</h2>
          <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
          <ul>
            <li>Clickable nav links that smooth scroll to page sections</li>
            <li>Responsive behavior when clicking nav links perfect for a one page website</li>
            <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
            <li>Minimal custom CSS so you are free to explore your own unique design options</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Services we offer</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contact us</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/index/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/index/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?= base_url('assets/index/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="<?= base_url('assets/index/'); ?>js/scrolling-nav.js"></script>

</body>

</html>
