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
                    <a href="<?php echo base_url('admin/mahasiswa'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $members; ?></h3>
                        <p>Jumlah Simpanan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="<?php echo base_url('admin/schedule'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $members; ?></h3>
                        <p>Jumlah Pinjaman</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="<?php echo base_url('admin/schedule/submission'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $members; ?></h3>
                        <p>Total Pembayaran</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                    <a href="<?php echo base_url('admin/schedule/history'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    
</div>

