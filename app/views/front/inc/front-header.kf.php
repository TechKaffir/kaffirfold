<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $page_title . ' | ' . APP_NAME ?></title>
  <meta content="With a user-friendly interface and intuitive design patterns, Kaffir Fold Framework takes you from the absolute beginning of your project to about 40% completion in no time. Our framework is not only easy to use but also highly customizable to fit the needs of your unique project" name="description">
  <meta content="PHP,MVC,Framework,Development,KaffirFold,Jongi Brands,Copmuter Science,Web, Internet" name="keywords">
  <meta content="Jongi Mbodla - The Tech Kaffir <jongim@jongibrandz.co.za>" name="keywords">

  <!-- Favicons -->
  <link href="<?= ROOT ?>/assets/img/<?= FAVICON ?>" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= ROOT ?>/assets/css/front-style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center text-light"><a class="text-white" href="mailto:<?= $comp_detail->email ?? 'salesoffice@jongibrandz.co.za' ?>"><?= $comp_detail->email ?? 'salesoffice@jongibrandz.co.za' ?></a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4 text-light"><span><a class="text-white" href="tel:<?= $comp_detail->phone ?? '+27123456789' ?>"><?= $comp_detail->phone ?? '27 12 345 6789' ?></a></span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center bg-light text-dark px-2" style="border-radius: 15px;">
        <a href="<?= $social_link->twitter_link ?? '#' ?>" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="<?= $social_link->facebook_link ?? '#' ?>" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="<?= $social_link->tiktok_link ?? '#' ?>" class="tiktok"><i class="bi bi-tiktok"></i></a>
        <?php if (!$logged_in_user) : ?>
          <a href="<?= ROOT . '/login' ?>"><i class="bi bi-door-open-fill text-<?= THEME_COLOR ?>"></i></i></a>
        <?php else : ?>
          <a href="<?= ROOT . '/admin' ?>"><i class="bi bi-speedometer2 text-<?= THEME_COLOR ?>"></i></i></a>
          <a href="<?= ROOT . '/logout' ?>"><i class="bi bi-door-closed-fill text-danger"></i></i></a>
        <?php endif ?>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <a href="<?= ROOT ?>"><img src="<?= ROOT ?>/assets/img/<?= LOGO ?>" width="" height="" alt="<?= LOGO_IMG_ALT ?>" class="img-fluid"></a>
      </div>
      <!-- Google Translate here -->
      <div class="translate bg-light px-3 shadow" id="google_translate_element"></div>
      <!-- Google Translate End -->
      <nav id="navbar" class="navbar">

        <nav id="navbar" class="navbar">
          <ul>
            <!--Theme Mode-->
            <div class="theme-toggler">
              <span><i class="bi bi-sun-fill"></i></span>
              <span><i class="bi bi-moon-stars-fill"></i></span>
            </div>
            <!--End Theme Mode-->
            <li><a class="active" href="<?= ROOT ?>">Home</a></li>
            <li><a href="<?= ROOT . '/home/contact' ?>">Contact</a></li>
            <li><a href="<?= ROOT ?>/home/blog">Blog</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        <ul id='blog-on-mobile'>
          <li><a href="<?= ROOT ?>/home/blog">Blog</a></li>
        </ul>


    </div>
  </header><!-- End Header -->