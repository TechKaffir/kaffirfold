<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="<?= ROOT ?>/admin">
        <i class="bi bi-grid text-<?= THEME_COLOR ?>"></i>
        <span class="text-<?= THEME_COLOR ?>">Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <hr class="text-<?= THEME_COLOR ?>">

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

    <!-- Departments Nav -->
    <li class="nav-item">
      <a class="nav-link " href="<?= ROOT ?>/admin/departments">
        <i class="bi bi-building text-<?= THEME_COLOR ?>"></i>
        <span class="text-<?= THEME_COLOR ?>">Departments</span>
      </a>
    </li><!-- End Departments Nav -->

    <!-- Example Module Nav Start -->
    <li class="nav-item">
      <a class="nav-link collapsed btn btn-outline-<?= THEME_COLOR ?>" data-bs-target="#patient-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Ex. Module &nbsp; <span style="color: #a8a8a8;font-size:10px">Main Module</span></span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="patient-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= ROOT ?>/admin/example/new">
            <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Add New </span>
          </a>
        </li>
        
        <li>
          <a href="<?= ROOT ?>/admin/documents/new">
            <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Upload Document</span>
          </a>
        </li>
      </ul>
    </li><!--/ Example Module Nav End -->

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
    </li><!--/ Blog Nav End -->

    <!-- Gallery Nav -->
    <li class="nav-item">
      <a class="nav-link " href="<?= ROOT ?>/admin/gallery">
        <i class="bi bi-image text-<?= THEME_COLOR ?>"></i>
        <span class="text-<?= THEME_COLOR ?>">Gallery</span>
      </a>
    </li><!-- End Gallery Nav -->

    <!-- Notifications Nav -->
    <li class="nav-item">
      <a class="nav-link " href="<?= ROOT ?>/admin/notifications">
        <i class="bi bi-broadcast text-<?= THEME_COLOR ?>"></i>
        <span class="text-<?= THEME_COLOR ?>">Notifications</span>
      </a>
    </li><!-- End Notifications Nav -->

    <!-- Listings Nav Start -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#listings-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-list text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Listings</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="listings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= ROOT ?>/admin/example">
            <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Ex. module - Raw Data</span>
          </a>
        </li>
        <li>
          <a href="<?= ROOT ?>/admin/example2">
            <i class="bi bi-circle-fill text-<?= THEME_COLOR ?>"></i><span class="text-<?= THEME_COLOR ?>">Ex. Module 2 - Raw Data</span>
          </a>
        </li>
      </ul>
    </li><!--/ Listings Nav End -->

    <!-- Settings Nav Start -->
    <?php
    switch ($_SESSION['userRole']) {
      case 'Admin': ?>
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
    <?php break;

      default:
        // Silence is platinum
        break;
    }
    ?>
    <!--/ Settings Nav End -->

  </ul>

</aside><!-- End Sidebar-->