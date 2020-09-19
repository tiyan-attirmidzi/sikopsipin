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
                                    <th>Judul</th>
                                    <th>Jenis Ujian</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($schedules as $schedule) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $schedule->uid; ?></td>
                                        <td><?php echo $schedule->first_name." ".$schedule->last_name; ?></td>
                                        <td>
											<span class="label label-<?php echo $genders[$schedule->gender]['label']; ?>"><?php echo $genders[$schedule->gender]['name']; ?></span>
                                        </td>
										<td><?php echo $schedule->title; ?></td>
										<td>
											<span class="label label-<?php echo $minithesisCategory[$schedule->category_id]['label']; ?>"><?php echo $minithesisCategory[$schedule->category_id]['name']; ?></span>
										</td>
                                        <td style="text-align:center">
											<a href="<?php echo base_url('admin/schedules/confirm/') ?><?php echo $schedule->id; ?>" class="btn bg-navy btn-sm" onclick="return confirm('Setujui pengajuan jadwal yang diajukan oleh <?php echo $schedule->first_name.' '.$schedule->last_name; ?> (<?php echo $schedule->uid; ?>) ?')">Setujui</a>
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
