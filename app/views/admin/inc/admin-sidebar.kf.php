<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <?php
    switch ($_SESSION['userRole']) {
      case 'Customer': ?>
        <li class="nav-item">
          <a class="nav-link " href="<?= ROOT ?>/admin">
            <i class="bi bi-grid text-<?= THEME_COLOR ?>"></i>
            <span class="text-<?= THEME_COLOR ?>">My Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->
      <?php
        break;

      default: ?>
        <li class="nav-item">
          <a class="nav-link " href="<?= ROOT ?>/admin">
            <i class="bi bi-grid text-<?= THEME_COLOR ?>"></i>
            <span class="text-<?= THEME_COLOR ?>">Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <hr class="text-<?= THEME_COLOR ?>">
    <?php
        break;
    }
    ?>

    <?php if ($_SESSION['userRole'] == 'customer') : ?>
      <!-- My Profile Nav -->
      <li class="nav-item">
        <a class="nav-link " href="<?= ROOT ?>/admin/details/<?= user('id') ?>">
          <i class="bi bi-credit-card text-<?= THEME_COLOR ?>"></i>
          <span class="text-<?= THEME_COLOR ?>">My Details</span>
        </a>
      </li><!-- End My Profile Nav -->
    <?php endif ?>
    <?php
    switch ($_SESSION['userRole']) {
      case 'Admin':
      case 'Property Manager':
      case 'Admin Clerk':
      case 'Landlord':
    ?>
        <!-- Users Nav Start -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Users</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= ROOT ?>/admin/users">
                <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Users List</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ Users Nav End -->

        <!-- Payments Nav -->
        <li class="nav-item">
          <a class="nav-link " href="<?= ROOT ?>/admin/payments">
            <i class="bi bi-credit-card text-<?= THEME_COLOR ?>"></i>
            <span class="text-<?= THEME_COLOR ?>">Payments</span>
          </a>
        </li><!-- End Payments Nav -->


        <!-- Customers Module Nav Start -->
        <li class="nav-item">
          <a class="nav-link collapsed btn btn-outline-<?= THEME_COLOR ?>" data-bs-target="#tenants-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Customers &nbsp;
              <span style="color: #a8a8a8;font-size:10px">Main Module</span></span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tenants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= ROOT ?>/admin/customers">
                <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Customers List </span>
              </a>
            </li>
            <li>
              <a href="<?= ROOT ?>/admin/documents">
                <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Documents</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ Customers Module Nav End -->

        <!-- Blog Nav Start -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-chat text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Blog</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="blog-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= ROOT ?>/admin/blog">
                <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Posts</span>
              </a>
            </li>
            <li>
              <a href="<?= ROOT ?>/admin/categories">
                <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Categories</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ Blog Nav End -->

        <!-- Gallery Nav -->
        <li class="nav-item">
          <a class="nav-link " href="<?= ROOT ?>/admin/gallery">
            <i class="bi bi-image text-<?= THEME_COLOR ?>"></i>
            <span class="text-<?= THEME_COLOR ?>">Gallery</span>
          </a>
        </li><!-- End Gallery Nav -->
    <?php break;

      default:
        # code...
        break;
    }
    ?>

    <!-- Settings Nav Start -->
    <?php
    switch ($_SESSION['userRole']) {
      case 'Customer':
        // Silent sound...
        break;

      default:
    ?>
        <!-- Notifications Nav -->
        <li class="nav-item">
          <a class="nav-link " href="<?= ROOT ?>/admin/notifications">
            <i class="bi bi-broadcast text-<?= THEME_COLOR ?>"></i>
            <span class="text-<?= THEME_COLOR ?>">Notifications</span>
          </a>
        </li><!-- End Notifications Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Settings</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= ROOT ?>/admin/companydetails">
                <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Company Details</span>
              </a>
            </li>
            <li>
              <a href="<?= ROOT ?>/admin/link">
                <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Social Links</span>
              </a>
            </li>
            <li>
              <a href="<?= ROOT ?>/admin/operatinghours">
                <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Operating Hours</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ Settings Nav End -->
  </ul>
<?php
        break;
    }
?>




</aside><!-- End Sidebar-->