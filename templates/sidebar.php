<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed;">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Classical Cryptograph</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            LATIHAN A
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("caesar-cipher-random") ?>">
                <span>Caesar Cipher <i>(Random)</i></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("caesar-cipher-one-key") ?>">
                <span>Caesar Cipher 1 Kunci</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            LATIHAN B
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("vigeneere-cipher") ?>">
                <span>Vignere Cipher</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            LATIHAN C
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("playfair-cipher") ?>">
                <span>Playfair Cipher</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("author") ?>">
                <span>About Me.</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
<!-- End of Sidebar -->