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
            <li class="nav-item">
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

            <li class="nav-item active">
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
                        <h3> TAMBAH DETAIL PENJUALAN </h3>
                        <hr></hr>
                        <form action="<?= base_url('penjualandetail/simpandetailpenjualan'); ?>" method="POST">
                            <input type="hidden" name="penjualan_id" value="<?= $penjualan['penjualan_id'] ?>"> <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <select class="form-select" name="barang_id" aria-label="Default select example">
                                <option selected>-- pilih barang --</option>

                                <?php foreach ($allbarang as $key => $barang) { ?>

                                    <option value="<?= $barang['barang_id'] ?>"><?= $barang['nama_barang'] ?> = <?= $barang['harga_barang'] ?> </option>
                                <?php } ?>

                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="exampleFormControlInput1" placeholder="jumlah">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Diskon</label>
                        <input type="number" name="diskon" class="form-control" id="exampleFormControlInput1" placeholder="diskon" value="0">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>