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
  <link href="<?= ROOT ?>/assets/img/<?= FAVICON ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!--Select 2-->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  
  <!-- Vendor CSS Files -->
  <link href="<?= ROOT ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet"> <!--Front End-->
  <link href="<?= ROOT ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> <!--Front End-->
  <link href="<?= ROOT ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> <!--Front End-->
  <link href="<?= ROOT ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Framework Main CSS File -->
  <link href="<?= ROOT ?>/assets/css/style.css" rel="stylesheet">
  <!-- Framework Main CSS File -->
  <link href="<?= ROOT ?>/assets/css/chat.css" rel="stylesheet">
  <!-- Frontend CSS File -->
  <link href="<?= ROOT ?>/assets/css/front-style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= ROOT ?>/admin" class="logo d-flex align-items-center">
        <img src="<?= ROOT ?>/assets/img/<?= LOGO ?>" alt="<?= LOGO_IMG_ALT ?>" width="200px" id="logo-img">
        <!-- <span class="d-none d-lg-block shadow p-2 text-light" id="app-name"><?= strtoupper(APP_NAME_SHORT) ?></span>  -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <?php if ($unreadNotifications && count($unreadNotifications) > 0) : ?>
              <span class="badge bg-danger badge-number"><?= count($unreadNotifications) ?></span>
            <?php endif; ?>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have <?= count($unreadNotifications) ?> new notification<?= count($unreadNotifications) == 1 ? '' : 's' ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="<?= ROOT ?>/admin/notifications">View all notifications</a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <?php if ($unreadNotifications) : foreach ($unreadNotifications as $row) : ?>
                <a href="<?= ROOT ?>/admin/notifications/view/<?= $row->notification_id ?>">
                  <li class="notification-item">
                    <i class="bi bi-chat text-primary"></i>
                    <div>
                      <h5><small>Notification ID: <strong><u><?= $row->notification_id ?></u></strong></small></h5>
                      <p><?= substr($row->message, 0, 20) ?></p>
                      <p><?= $row->date_created ?></p>
                    </div>
                  </li>
                </a>
              <?php endforeach;
            else : ?>
            <?php endif; ?>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
    &nbsp;&nbsp;&nbsp;
    <nav class="header-nav">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown" id="comp-website">
          <a href="<?= ROOT ?>" class="nav-link text-<?= THEME_COLOR ?>"> <i class="bi bi-globe"></i><span>&nbsp;<small>CENTRE WEBSITE</small></span></a>
        </li>
        <!--Theme Mode-->
        <div class="theme-toggler ms-5">
            <span><i class="bi bi-sun-fill"></i></span>
            <span><i class="bi bi-moon-stars"></i></span>
          </div>
          <!--End Theme Mode-->
      </ul>
    </nav><!-- End Front Website Navigation -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3" id="profile-dropdown">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= get_image(user('image'),'user') ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-<?= THEME_COLOR ?>"><?= user('firstname') . ' ' . user('surname') ?></span> 
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= user('firstname') . ' ' . user('surname') ?></h6>
              <span><?= user('designation') ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= ROOT ?>/admin/users/view/<?= user('id') ?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= ROOT ?>/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->