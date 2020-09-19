			<?php echo form_open("");?>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="<?php echo set_value('name'); ?>">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					<span class='text-danger'>
                        <?php echo form_error('name'); ?>
                    </span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
					<span class="glyphicon glyphicon-tag form-control-feedback"></span>
					<span class='text-danger'>
                        <?php echo form_error('username'); ?>
                    </span>
				</div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <span class='text-danger'>
                        <?php echo form_error('email'); ?>
                    </span>
                </div>
                <div class="form-group has-feedback">
					<div class="form-group">
						<select class="form-control" name="gender">
							<option>Jenis Kelamin</option>
							<option value="1">Laki-laki</option>
							<option value="2">Perempuan</option>
						</select>
						<span class='text-danger'>
							<?php echo form_error('gender'); ?>
						</span>
					</div>
				</div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nomor Handphone" name="phone" value="<?php echo set_value('phone'); ?>">
					<span class="glyphicon glyphicon-phone form-control-feedback"></span>
					<p class="help-block">Format : 081122334455</p>
                    <span class='text-danger'>
                        <?php echo form_error('phone'); ?>
                    </span>
                </div>
				<div class="form-group has-feedback">
					<div class="form-group">
						<textarea class="form-control" rows="3" placeholder="Alamat" name="address"></textarea>
					</div>
                    <span class='text-danger'>
                        <?php echo form_error('address'); ?>
                    </span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span class='text-danger'>
                        <?php echo form_error('password'); ?>
                    </span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Ulangi Password" name="password-confirm" value="<?php echo set_value('password-confirm'); ?>">
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
					<span class='text-danger'>
                        <?php echo form_error('password-confirm'); ?>
                    </span>
				</div>
				<div class="text-child">
					<a href="<?php echo base_url(); ?>" class="text-center">Telah memiliki akun? Silahkan Masuk</a> 
				</div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrasi</button>
                    </div>
                </div>
			<?php echo form_close(); ?>

