<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $pageTitle; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <?php if ($this->uri->segment(1)=='admin') { ?>
                <li><a href="<?php echo base_url($pageCurrent) ?>"><?php echo $pageContent; ?></a></li>
                <li class="active">Edit</li>
            <?php } ?>
            <?php if ($this->uri->segment(1)=='member') { ?>
                <li class="active"><?php echo $pageContent; ?></li>
            <?php } ?>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $pageTitleSub; ?></h3>
                    </div>

                    <?php echo form_open_multipart("");?>
                        <div class="box-body">

                            <?php
                                if($this->session->flashdata('alert')) {
                                    echo $this->session->flashdata('alert');
                                }
                            ?>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Lengkap" value="<?php echo set_value('name', $member[0]->name); ?>">
                                    <span class='text-danger'>
                                        <?php echo form_error('name'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?php echo set_value('username', $member[0]->username); ?>">
                                    <span class='text-danger'>
                                        <?php echo form_error('username'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?php echo set_value('email', $member[0]->email); ?>">
                                    <span class='text-danger'>
                                        <?php echo form_error('email'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Nomor Handphone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan Nomor Handphone" value="<?php echo set_value('phone', $member[0]->phone); ?>">
                                    <span class="help-block"><i>Format : <b>08xxxxxxxxxx</b></i></span>
                                    <span class='text-danger'>
                                        <?php echo form_error('phone'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <?php for ($i=0; $i < count($genders); $i++) { ?>
                                            <option value="<?php echo $i; ?>" <?php echo $member[0]->gender == $i ? "selected" : "" ?>><?php echo $genders[$i]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea class="form-control" name="address" id="address" rows="3" placeholder="Masukkan Alamat Lengkap"><?php echo set_value('address', $member[0]->address); ?></textarea>
                                    <span class='text-danger'>
                                        <?php echo form_error('address'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?php echo set_value('password'); ?>">
                                    <span class='text-danger'>
                                        <?php echo form_error('password'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm">Ulangi Password</label>
                                    <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Masukkan Ulang Password" value="<?php echo set_value('password-confirm'); ?>">
                                    <span class='text-danger'>
                                        <?php echo form_error('password-confirm'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="help-block"><i>Apabila tidak ingin mengganti password cukup kosongkan form <b>Password Baru</b> dan <b>Ulangi Password</b></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <a href="javascript:window.history.go(-1);" class="btn btn-default">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </section>

</div>