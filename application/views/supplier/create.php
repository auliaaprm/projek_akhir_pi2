<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?=base_url();?>assets/img/toko_at.png" height="70" width="70">
                </div>
                <div class="sidebar-brand-text mx-1">Toko Alat Tulis</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Dashboard Admin
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url();?>barang/">
                <i class="fas fa-box-open"></i>
                <span>Barang</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url();?>supplier/">
                <i class="fas fa-user-tie"></i>
                <span>Supplier</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url();?>pelanggan">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->
            <div class="sidebar-heading">
                Update Stok Barang
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url();?>penjualan/">
                <i class="fas fa-arrow-alt-circle-left"></i>
                <span>Penjualan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url();?>pembelian/">
                <i class="fas fa-arrow-alt-circle-right"></i>
                <span>Pembelian</span></a>
            </li>


                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-success bg-dark topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card" style="width: 40rem; padding: 20px 20px 20px 20px; margin:auto;">
                    <div class="card-body" >
                    <div class="col-md-10 mt-3">
                    <h3> TAMBAH DATA SUPPLIER </h3>
                        <hr></hr>
                        <form action="<?= base_url('supplier/simpansupplier') ?>" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Supplier</label>
                                <input type="text" name="nama_supplier" class="form-control" id="exampleFormControlInput1" placeholder="nama supplier">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                                <input type="text" name="no_tlp" class="form-control" id="exampleFormControlInput1" placeholder="no telepon">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>