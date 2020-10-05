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
                                        <a class="main-btn2" href="<?= base_url('auth'); ?>">Masuk</a>
                                    </li>
                                </ul>
                            </div> 
                        </nav> 
                    </div>
                </div>
            </div> 
        </div> 
        <div id="home" class="header_slider">
            <div class="single_slider d-flex align-items-center" style="background-color: #494FCA;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="slider_content">
                                <h4 class="slider_title fadeInUp" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    Platform Sekolah Online <br>
                                    yang Menyenangkan</h4>
                                <p class="slider_slogan fadeInDown mt-4" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.5s; animation-name: fadeInDown;">Belajar lebih mudah, kapanpun, dimanapun <br>
                                    Mudah dijangkau hingga kepelosok negeri.</p>
                                <a href="htt<?= base_url('auth/register'); ?>" rel="" class="main-btn fadeInLeftBig" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.8s; animation-name: fadeInLeftBig;">Mulai Belajar</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="hero-image fadeInRightBig" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.8s; animation-name: fadeInRightBig;">
                                <img src="<?= base_url('assets/img/'); ?>Illustration.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>
    <!-- asd -->


  <!-- Footer -->
  <footer class="footer-area" id="footer">
        <div class="container pt-70 border-bottom d-flex justify-content-between">
            <div class="container pb-50">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-5">
                        <img style="width:50%;" src="<?= base_url('assets/img/'); ?>logo.png" alt="">
                    </div>
                    <div class="col-lg-3 col-md-6 mt-5">
                        <h4>Address</h4>
                        <p class="mt-3">
                            Jl. Warung Buncit Raya No.40D, RT.1/
                            RW.2, Duren Tiga, Kec. Pancoran, Kota
                            Jakarta Selatan, Daerah Khusus
                            Ibukota Jakarta, 12760
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-6 mt-5">
                        <h4>About Us</h4>
                        <div class="link mt-3">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="socmed col-lg-3 col-md-6 mt-5">
                        <h4>Contact</h4>
                        <div class="link mt-3">
                            <ul>
                                <li><a href="#">info@ajaruji.com</a></li>
                                <li><a href="#">ajaruji</a></li>
                                <li><a href="#">0812-1314-1516</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row pt-20 pb-20">
                <div class="col-12">
                    © Copyright Ajar Uji - All right reserved
                </div>
            </div>
        </div>
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
