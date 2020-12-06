<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $this->session->userdata("image"); ?>" class="img-circle" alt="User Image">
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
				<li class="treeview <?php if($this->uri->segment(2)=='members'){ echo "active"; }?>">
					<a href="#">
						<i class="fa fa-user"></i>
						<span>Anggota</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="<?php if($this->uri->segment(3)=='new'){ echo "active"; }?>">
							<a href="<?php echo base_url('admin/members/new'); ?>">
							<i class="fa fa-circle-o"></i> Baru</a>
						</li>
						<li class="<?php if($this->uri->segment(2)=='members' && $this->uri->segment(3)==''){ echo "active"; }?>">
							<a href="<?php echo base_url('admin/members'); ?>">
							<i class="fa fa-circle-o"></i> Aktif</a>
						</li>
					</ul>
				</li>
				<li class="<?php if($this->uri->segment(2)=='savings' || $this->uri->segment(2)=='savings' && $this->uri->segment(3)=='member'){echo "active";}?>">
					<a href="<?php echo base_url('admin/savings'); ?>">
						<i class="fa fa-money"></i> <span>Simpanan</span>
					</a>
				</li>
				<li class="<?php if($this->uri->segment(2)=='loans' || $this->uri->segment(2)=='loans' && $this->uri->segment(3)=='member'){echo "active";}?>">
					<a href="<?php echo base_url('admin/loans'); ?>">
						<i class="fa fa-credit-card"></i> <span>Pinjaman</span>
					</a>
				</li>
			<?php } else { ?>
				<li class="<?php if($this->uri->segment(2)==''){echo "active";}?>">
					<a href="<?php echo base_url('member'); ?>">
						<i class="fa fa-dashboard"></i> <span>Beranda</span>
					</a>
				</li>
				<li class="<?php if($this->uri->segment(2)=='profile'){echo "active";}?>">
					<a href="<?php echo base_url('member/profile'); ?>">
						<i class="fa fa-user"></i> <span>Profil</span>
					</a>
				</li>
				<li class="<?php if($this->uri->segment(2)=='savings'){echo "active";}?>">
					<a href="<?php echo base_url('member/savings'); ?>">
						<i class="fa fa-money"></i> <span>Simpanan</span>
					</a>
				</li>
				<li class="<?php if($this->uri->segment(2)=='loans'){echo "active";}?>">
					<a href="<?php echo base_url('member/loans'); ?>">
						<i class="fa fa-credit-card"></i> <span>Pinjaman</span>
					</a>
				</li>
			<?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
