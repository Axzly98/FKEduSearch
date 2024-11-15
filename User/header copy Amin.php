<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>FK-EduSearch</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/logoUMPIcon.jpeg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- ========================================================
  * Template Name: Append
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="blog-page">

  <!-- ======= Header ======= -->
  <header id="header" class="header position-relative d-flex align-items-center scroll-up-sticky">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="https://ump.edu.my/en" target="_blank" class="logo d-flex align-items-center me-auto me-xl-0">

        <img src="assets/img/logoUMP.png" alt="Logo UMP" width="auto" height="auto" class="image-class" id="image-id">
        <span></span>
      </a>
	  
	  <nav id="navmenu" class="navmenu">
        <ul>
          <li style="color : #18A0FB ; font-weight: bold">Universiti Malaysia Pahang</li>
        </ul>
		
		

       
      </nav>

      <a style="color : #18A0FB"><?php echo "<b> Date Today: ".date("j F ,  Y")."</b>"; ?></a>

    </div>
  </header><!-- End Header -->
  
<hr>

  <!-- ======= Header ======= -->
  <header id="header" class="header position-relative d-flex align-items-center scroll-up-sticky">
    <div class="container-fluid d-flex align-items-center justify-content-between">

   <!--    <a href=" " class="logo d-flex align-items-center me-auto me-xl-0"> -->

        <p>Sini Profile Picture Expert, Social Media, Current Active (drpd database)</p>
       
    <!--  </a> -->
	  
	  


	  
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    <!-- Nav Menu -->
<nav id="navmenu" class="navmenu">
  <ul>
    <li <?php if ($page == 'home') echo 'class="active"'; ?>>
      <a href="expertHome.php" style="<?php if ($page == 'home') echo 'color: red;'; else echo 'color: #18A0FB;'; ?> font-weight: bold" id="home">Home</a>
    </li>
    <li <?php if ($page == 'post') echo 'class="active"'; ?>>
      <a href="expertPost.php" style="<?php if ($page == 'post') echo 'color: red;'; else echo 'color: #18A0FB;'; ?> font-weight: bold" id="post">Post</a>
    </li>
    <li <?php if ($page == 'publication') echo 'class="active"'; ?>>
      <a href="expertPublication.php" style="<?php if ($page == 'publication') echo 'color: red;'; else echo 'color: #18A0FB;'; ?> font-weight: bold" id="publication">Publication</a>
    </li>
    <li <?php if ($page == 'profile') echo 'class="active"'; ?>>
      <a href="expertProfile.php" style="<?php if ($page == 'profile') echo 'color: red;'; else echo 'color: #18A0FB;'; ?> font-weight: bold" id="profile">Profile</a>
    </li>
    <li><a href="logout.php" style="color: #18A0FB; font-weight: bold">Logout</a></li>
  </ul>
</nav>

		


      
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->
	<div class="sidebar">
      <div class="sidebar-item search-form">
                <form action="" class="mt-3">
                  <input type="text" placeholder="Search Publication">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search form-->

    </div>
  </header><!-- End Header Second -->
  
<hr>


  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
  
    <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
     

</body>

</html>