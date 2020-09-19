 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $pageTitle; ?>
        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('mahasiswa') ?>"><i class="fa fa-dashboard"></i> <?php echo $pageContent; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $pageTitleSub; ?></h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <?php echo form_open_multipart("");?>
                        <div class="box-body">

                            <?php
                                if($this->session->flashdata('alert')) {
                                    echo $this->session->flashdata('alert');
                                }
                            ?>

                            <div class="col-md-6">
                                <div class="form-group">
									<label for="name">Nama</label><span class='text-danger'> *</span>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->session->userdata("full_name"); ?>" readonly>
                                </div>
							</div>
                            <div class="col-md-6">
                                <div class="form-group">
									<label for="nim">NIM</label><span class='text-danger'> *</span>
                                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $this->session->userdata("nim"); ?>" readonly>
                                </div>
							</div>
                            <div class="col-md-12">
                                <div class="form-group">
									<label for="title">Judul</label><span class='text-danger'> *</span>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul" value="<?php echo set_value('title', $minithesis[0]->title); ?>">
                                    <span class='text-danger'>
                                        <?php echo form_error('title'); ?>
                                    </span>
                                </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="guide1">Dosen Pembimbing 1</label><span class='text-danger'> *</span>
									<input type="text" class="form-control" id="guide1" name="guide1" placeholder="Masukkan Nama Pembimbing 1" value="<?php echo set_value('guide1', $minithesis[0]->guide_one); ?>">
									<span class='text-danger'>
										<?php echo form_error('guide1'); ?>
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="examiner1">Dosen Penguji 1</label><span class='text-danger'> *</span>
									<input type="text" class="form-control" id="examiner1" name="examiner1" placeholder="Masukkan Nama Penguji 1" value="<?php echo set_value('examiner1', $minithesis[0]->examiner_one); ?>">
									<span class='text-danger'>
										<?php echo form_error('examiner1'); ?>
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="guide2">Dosen Pembimbing 2</label><span class='text-danger'> *</span>
									<input type="text" class="form-control" id="guide2" name="guide2" placeholder="Masukkan Nama Pembimbing 2" value="<?php echo set_value('guide2', $minithesis[0]->guide_two); ?>">
									<span class='text-danger'>
										<?php echo form_error('guide2'); ?>
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="examiner2">Dosen Penguji 2</label><span class='text-danger'> *</span>
									<input type="text" class="form-control" id="examiner2" name="examiner2" placeholder="Masukkan Nama Penguji 2" value="<?php echo set_value('examiner2', $minithesis[0]->examiner_two); ?>">
									<span class='text-danger'>
										<?php echo form_error('examiner2'); ?>
									</span>
								</div>
							</div>
							<div class="col-md-12 col-md-offset-6">
								<div class="form-group">
									<label for="examiner3">Dosen Penguji 3</label><span class='text-danger'> *</span>
									<input type="text" class="form-control" id="examiner3" name="examiner3" placeholder="Masukkan Nama Penguji 3" value="<?php echo set_value('examiner3', $minithesis[0]->examiner_three); ?>">
									<span class='text-danger'>
										<?php echo form_error('examiner3'); ?>
									</span>
								</div>
							</div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </section>

 </div>
