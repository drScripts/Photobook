 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">PhotooBook <sup>
                 <!-- nama admin -->
             </sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-home "></i>
             <span>Home</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Pengelolaan</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Produk</h6>
                 <a class="collapse-item" href="index.php?halaman=kategori">Kategori</a>
                 <a class="collapse-item" href="index.php?halaman=produk">Produk</a>
                 <a class="collapse-item" href="index.php?halaman=pembelian">Pembelian</a>
                 <a class="collapse-item" href="index.php?halaman=pelanggan">Pelanggan</a>
                 <a class="collapse-item" href="index.php?halaman=ongkir">Ongkir</a>
                 <a class="collapse-item" href="index.php?halaman=laporanpembelian">Laporan Pembalian</a>
                 <a class="collapse-item" href="index.php?halaman=promo">Promo</a>
             </div>
         </div>
     </li>



     <!-- Divider -->


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
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
             <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                 <div class="input-group">
                     <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                         <button class="btn btn-primary" type="button">
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
                                     placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                 <div class="input-group-append">
                                     <button class="btn btn-primary" type="button">
                                         <i class="fas fa-search fa-sm"></i>
                                     </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </li>



                 <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                             <!-- nama admin -->
                         </span>
                         <i class="fas fa-user"></i> <?= $_SESSION['admin']['username']; ?>
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="userDropdown">
                         <a class="dropdown-item" href="index.php?halaman=profile">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Profile
                         </a>


                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Logout
                         </a>
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
                         <h5 class="modal-title" id="exampleModalLabel">want to Leave?</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span>
                         </button>
                     </div>
                     <div class="modal-body">Are you sure?</div>
                     <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <a class="btn btn-primary" href="index.php?halaman=logout">Logout</a>
                     </div>
                 </div>
             </div>
         </div>