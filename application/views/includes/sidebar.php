<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/img/<?= $this->session->userdata("image"); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata("name"); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata("email"); ?></a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
			<?php if ($this->uri->segment(1) == 'admin') { ?>	
				<li class="<?php if($this->uri->segment(2)==''){echo "active";}?>">
					<a href="<?php echo base_url('admin'); ?>">
						<i class="fa fa-dashboard"></i> <span>Beranda</span>
					</a>
				</li>
				<li class="<?php if($this->uri->segment(2)=='members'){echo "active";}?>">
					<a href="<?php echo base_url('admin/members'); ?>">
						<i class="fa fa-user"></i> <span>Anggota</span>
					</a>
				</li>
				<!-- <li class="treeview">
					<a href="">
						<i class="fa fa-dashboard"></i> <span>Simpanan</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Input Simpanan</a></li>
						<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
					</ul>
				</li> -->
				<li class="<?php if($this->uri->segment(2)=='savings' && $this->uri->segment(3)==''){echo "active";}?>">
					<a href="<?php echo base_url('admin/savings'); ?>">
						<i class="fa fa-money"></i> <span>Simpanan</span>
					</a>
				</li>
				<li class="<?php if($this->uri->segment(2)=='schedules' && $this->uri->segment(3)==''){echo "active";}?>">
					<a href="<?php echo base_url('admin/schedules'); ?>">
						<i class="fa fa-credit-card"></i> <span>Pinjaman</span>
					</a>
				</li>
				<li class="<?php if($this->uri->segment(3)=='history'){echo "active";}?>">
					<a href="<?php echo base_url('admin/schedule/history'); ?>">
						<i class="fa fa-dollar"></i> <span>Pembayaran</span>
					</a>
				</li>
			<?php } else { ?>
				<li class="<?php if($this->uri->segment(2)==''){echo "active";}?>">
					<a href="<?php echo base_url('member'); ?>">
						<i class="fa fa-dashboard"></i> <span>Beranda</span>
					</a>
				</li>
				<li class="<?php if($this->uri->segment(3)=='request'){echo "active";}?>">
					<a href="<?php echo base_url('member/'); ?>">
						<i class="fa fa-money"></i> <span>Simpanan</span>
					</a>
				</li>
				<li class="<?php if($this->uri->segment(2)=='schedules' && $this->uri->segment(3)==''){echo "active";}?>">
					<a href="<?php echo base_url('member/'); ?>">
						<i class="fa fa-credit-card"></i> <span>Pinjaman</span>
					</a>
				</li>
			<?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
