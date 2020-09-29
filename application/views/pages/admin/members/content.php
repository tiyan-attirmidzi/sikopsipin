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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $pageTitleSub; ?></h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-sm hidden-xs" style="width: 70px;">
                                <div class="input-group-btn" style="padding-left: 15px;">
                                    <button type="button" class="btn btn-reload" onclick="location.href='<?php echo base_url($pageCurrent); ?>'"><i class="fa fa-refresh"></i> Refresh</button>
                                </div>
                                <div class="input-group-btn" style="padding-left: 15px;">
                                    <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url($pageCurrent); ?>/insert'"><i class="fa fa-plus"></i> Tambah</button>
                                </div>
                            </div>                            
                        </div>
                    </div>

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
                                    <tr id="<?php echo $member->id; ?>">
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
                                            <button type="button" class="btn btn-success btn-sm" onclick="location.href='<?php echo base_url($pageCurrent.'/update/'.$member->id); ?>'">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
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
