<header class="main-header">
    
    <a href="index2.html" class="logo">
        <span class="logo-mini"><b>S</b>K</span>
        <span class="logo-lg"><b>SI</b> KOPSIPIN</span>
	</a>
	
    <nav class="navbar navbar-static-top">
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>assets/img/<?= $this->session->userdata("image"); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            <?php echo $this->session->userdata("name"); ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?php echo base_url(); ?>assets/img/<?= $this->session->userdata("image"); ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $this->session->userdata("name"); ?>
                                <small> 
                                    <?php
                                        if ($this->session->userdata("role") == 1) echo "Admin" ;
                                        else echo "Anggota" ;
                                    ?>
                                </small>
                            </p>
                        </li>
                        <li class="user-footer">
							<a href="<?php echo base_url('logout'); ?>" class="btn btn-default btn-flat">Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
	</nav>
	
</header>
