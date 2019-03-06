<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pembangkit Listrik Tenaga Sampah</title>
  <script type="text/javascript" src="artyom.window.min.js"></script>
  <script>
         window.artyom = new Artyom();
    </script>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
<div>
   
</div>

<script>
        function startArtyom(){
            artyom.initialize({
   lang:"id-ID",// More languages are documented in the library
   continuous:true,//if you have https connection, you can activate continuous mode
   debug:true,//Show everything in the console
   listen:true // Start listening when this function is triggered
});   
        }

        artyom.addCommands({
  smart:true,// We need to say that this command is smart !
  indexes:["siapa *"], // * = the spoken text after How many people live in is recognized
  action:function(i,wildcard){
    switch(wildcard){
      case "nanya":
        artyom.say("anda sedang bertanya");
       // window.open("http://www.google.com");
        location.href = "https://www.w3schools.com";
      break;
      case "kamu":
      artyom.say("saya adalah sistem pintar smartgrid");
     // window.open("http://www.dumetschool.com", "DUMET School", "height=700, width=500, scrollbars=yes");
      break;
      default:
       // alert("I don't know what city is " + * + ". try to increase the switch cases !");
      break;
    }
  }
});

     artyom.addCommands({
  indexes:["hai"],
  action: function(i){
    if(i == 0) {
        artyom.say("Hello all")
    }
   // console.log("Something matches");
  }
});
    </script>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
    
        
        <h1><a href="#body" class="scrollto">Uchiha Smartgrid</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Beranda</a></li>
          <li class="menu-has-children"><a href="">Login</a>
            <ul>
              <li><a href="enggine/agen">Agen Pembayaran</a></li>
              <li><a href="enggine/plts">Petugas</a></li>
              <li><a href="admin.php">Editor</a></li>
            </ul>
          </li>
          <li><a href="blog.php">Informasi</a></li>
          <li><a href="eve/">Acara</a></li>
          <li><a href="#contact">Pemesanan</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h1>Welcome to Uchiha Smartgrid</h1>
      <h2>Green Energy For Society &amp; more...</h2>
      <img src="img/hero-img.png" alt="Hero Imgs">
      
      <a href="#get-started"  onclick="startArtyom()" class="btn-get-started scrollto">Mulai</a>
      <div class="btns">
      </div>
    </div>
  </section><!-- #hero -->

  <!--==========================
    Get Started Section
  ============================-->
  <section id="get-started" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>Pembangkit Listrik Energi Terbaharukan</h2>
        <p class="separator">Keuntungan Menggunakan PLT</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="img/svg/cloud.svg" alt="img" class="img-fluid">
            <h4>Energi Ramah Lingkungan</h4>
            <p>PLT ini akan mengurangi sampah pada lingkungan</p>
          

          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="img/svg/planet.svg" alt="img" class="img-fluid">
            <h4>pemesanan yang mudah</h4>
            <p>memberikan layanan terbaik untuk masyarakat</p>
           

          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="img/svg/asteroid.svg" alt="img" class="img-fluid">
            <h4>Terintegrasi</h4>
            <p>Terintegrasi dengan teknologi canggih</p>
            

          </div>
        </div>

      </div>
    </div>

  </section>
  
  <!--==========================
    Newsletter Section
  ============================-->
  <section id="newsletter" class="newsletter text-center wow fadeInUp">
    <div class="overlay padd-section">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-9 col-lg-6">
            <form class="form-inline" method="POST" action="#">

              <input type="email" class="form-control " placeholder="Email Adress" name="email">
              <button type="submit" class="btn btn-default"><i class="fa fa-location-arrow"></i>Subscribe</button>

            </form>

          </div>
        </div>

          <ul class="list-unstyled">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>


      </div>
    </div>
  </section>

  <!--==========================
    Contact Section
  ============================-->
  <section id="contact" class="padd-section wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Hubungi Kami</h2>
        <p class="separator">Untuk Informasi lebih lanjut silakan menghubungi kami melalui kotak pesan</p>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>Jalan Raden Inten<br>Jakarta Timur</p>
            </div>

            <div class="email">
              <i class="fa fa-envelope"></i>
              <p>info@example.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>+62 5589 55488 555</p>
            </div>
          </div>

          <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>

        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="sendmessage">Pesan Anda Telah terkirim terimakasih !</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Minimal 4 huruf" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Silakan Input email dengan benar" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Tema Pesan" data-rule="minlen:4" data-msg="Minimum 8 huruf" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Silakan tulis pesan" placeholder="Pesan"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section><!-- #contact -->

 



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/modal-video/js/modal-video.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
