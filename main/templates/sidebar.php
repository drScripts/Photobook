<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-store animate__animated animate__fadeInUpBig"></i>
                </div>
                <div class="sidebar-brand-text mx-3 animate__animated animate__fadeInRightBig">PhotoBook Story</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active animate__animated animate__fadeInUpBig ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider animate__animated animate__fadeInUpBig">

            <!-- Heading -->
            <div class="sidebar-heading animate__animated animate__fadeInUpBig">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link collapsed animate__animated animate__fadeInUpBig" href="#" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Kategori</span>
                </a>
                <div id="collapseTwo" class="collapse animate__animated animate__fadeInUpBig"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kategori</h6>
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM kategori");
                        while ($pecah = $ambil->fetch_assoc()) { ?>
                        <a class="collapse-item animate__animated animate__fadeInUpBig"
                            href="kategori.php?id=<?php echo $pecah['id_kategori'] ?>"><?php echo $pecah['kategori'] ?></a>
                        <?php } ?>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider animate__animated animate__fadeInUpBig">

            <!-- Heading -->
            <div class="sidebar-heading animate__animated animate__fadeInUpBig">
                Buyying
            </div>


            <!-- Nav Item - Cart -->
            <li class="nav-item animate__animated animate__fadeInUpBig">
                <a class="nav-link" href="keranjang.php">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Cart</span></a>
            </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item animate__animated animate__fadeInUpBig">
                <a class="nav-link" href="riwayat.php">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History Checkout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline animate__animated animate__fadeInUpBig">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search animate__animated animate__fadeInRightBig"
                        method="get" action="pencarian.php">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" name="search" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>





                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow animate__animated animate__fadeInUpBig">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['pelanggan'])) : ?>
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></span>
                                <?php else : ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Username</span>

                                <?php endif ?>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">



                                <?php if (isset($_SESSION['pelanggan'])) : ?>
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <?php else : ?>
                                <a class="dropdown-item" href="login.php">
                                    <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Login!
                                </a><a class="dropdown-item" href="register.php">
                                    <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Register!
                                </a>
                                <?php endif ?>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>