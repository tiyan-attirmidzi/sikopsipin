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
                                    <th>Nomor Anggota</th>
									<th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Handphone</th>
                                    <th>Bergabung Sejak</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($members as $member) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $member->uid; ?></td>
                                        <td><?php echo $member->username; ?></td>
                                        <td><?php echo $member->name; ?></td>
                                        <td><?php echo $member->email; ?></td>
                                        <td>
											<span class="label label-<?php echo $genders[$member->gender]['label']; ?>"><?php echo $genders[$member->gender]['name']; ?></span>
                                        </td>
										<td><?php echo $member->phone; ?></td>
										<td><?php echo $member->joined_since; ?></td>
                                        <td style="text-align:center">
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-<?php echo $member->id; ?>">Hapus</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-delete-<?php echo $member->id; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Hapus Data</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin menghapus Mahasiswa dengan NIM <b><?php echo $member->uid; ?></b> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                                            <button type="button" class="btn btn-danger" onclick="location.href='<?php echo base_url($pageCurrent.'/destroy/'.$member->id); ?>'">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $no++; } ?>
                            </tbody>
                            <tfoot>
                                <tr>
									<th>No</th>
                                    <th>Nomor Anggota</th>
									<th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Handphone</th>
                                    <th>Bergabung Sejak</th>
                                    <th>Pilihan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
