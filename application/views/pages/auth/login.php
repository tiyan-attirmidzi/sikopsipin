			<?php echo form_open("");?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username / Email" name="username" value="<?php echo set_value('username'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <span class='text-danger'>
                        <?php echo form_error('username'); ?>
                    </span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span class='text-danger'>
                        <?php echo form_error('password'); ?>
                    </span>
				</div>
				<div class="text-child">
					<a href="<?php echo base_url(); ?>registration" class="text-center">Belum memiliki akun? Silahkan Registrasi</a> 
				</div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                    </div>
                </div>
			<?php echo form_close(); ?>
