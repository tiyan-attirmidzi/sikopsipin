<div class="content-wrapper">
 
    <section class="content-header">
        <h1>
            Beranda
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $members; ?></h3>
                        <p>Anggota</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Rp. <?php echo number_format($savings); ?></h3>
                        <p>Jumlah Simpanan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>Rp. <?php echo number_format($loans); ?></h3>
                        <p>Jumlah Pinjaman</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>Rp. <?php echo number_format($paid); ?></h3>
                        <p>Total Pembayaran</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>

