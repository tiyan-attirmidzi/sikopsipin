<div class="content-wrapper">
 
    <section class="content-header">
        <h1>
            <?php echo $pageTitle; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><?= $pageContent ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $pageTitleSub; ?></h3>
                    </div>
                    <?php echo form_open("");?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="member_id">Nomor Anggota</label>
                                <input type="text" class="form-control" id="number" name="member_id" placeholder="Masukkan Nomor Anggota" value="<?php echo set_value('member_id'); ?>">
                                <span class='text-danger'>
                                    <?php echo form_error('member_id'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
    
</div>