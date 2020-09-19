 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $pageTitle; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><?= $pageContent ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $pageTitleSub; ?></h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-sm hidden-xs" style="width: 70px;">
                                <div class="input-group-btn" style="padding-left: 15px;">
                                    <button type="button" class="btn btn-reload" onclick="location.href='<?php echo base_url($pageCurrent); ?>'"><i class="fa fa-refresh"></i> Refresh</button>
                                </div>
                                <div class="input-group-btn" style="padding-left: 15px;">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Tambah</button>
                                </div>
                            </div>                            
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php
                            if($this->session->flashdata('alert')) {
                                echo $this->session->flashdata('alert');
                            }
                        ?>
        
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Lengkap</th>
									<th>Jenis Kelamin</th>
                                    <th>Nomor Handphone</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($collageStudents as $collageStudent) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $collageStudent->uid; ?></td>
                                        <td><?php echo $collageStudent->first_name." ".$collageStudent->last_name; ?></td>
                                        <td>
											<span class="label label-<?php echo $genders[$collageStudent->gender]['label']; ?>"><?php echo $genders[$collageStudent->gender]['name']; ?></span>
                                        </td>
										<td><?php echo $collageStudent->phone; ?></td>
                                        <td style="text-align:center">
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-<?php echo $collageStudent->id; ?>">Hapus</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-delete-<?php echo $collageStudent->id; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Hapus Data</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin menghapus Mahasiswa dengan NIM <b><?php echo $collageStudent->uid; ?></b> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                                            <button type="button" class="btn btn-danger" onclick="location.href='<?php echo base_url($pageCurrent.'/destroy/'.$collageStudent->id); ?>'">Hapus</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.Modal -->
                                        </td>
                                    </tr>
                                <?php $no++; } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
									<th>NIM</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Handphone</th>
                                    <th>Pilihan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
		<!-- /.row -->
		
		<!-- Modal Add -->
		<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modalAddLabel">Tambah Mahasiswa</h4>
					</div>
					<form action="<?php echo base_url().'admin/mahasiswa/create'; ?>" method="post">
						<div class="modal-body">
							<div class="form-group">
								<label for="first_name">Nama Depan</label>
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Masukkan Nama Depan" required>
							</div>
							<div class="form-group">
								<label for="last_name">Nama Belakang</label>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Masukkan Nama Belakang" required>
							</div>
							<div class="form-group">
								<label for="select-gender" class="col-form-label">Jenis Kelamin</label>
								<select id="gender" name="gender" class="form-control">
									<option value="0">Perempuan</option>
									<option value="1">Laki-laki</option>
								</select>
							</div>
							<div class="form-group">
								<label for="nim">NIM</label>
								<input type="text" class="form-control" name="nim" id="nim" placeholder="Masukkan NIM" required>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
							</div>
							<div class="form-group">
								<label for="phone">Nomor Handphone</label>
								<input type="text" class="form-control" name="phone" id="phone" placeholder="Masukkan Nomor Handphone" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        					<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
