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
            <div class="col-md-6">
                <h2><?php echo $member[0]->uid; ?></h2>
                <div class="mt-2">
                    <h4><strong><?php echo $member[0]->name; ?></strong></h4>
                    <p><?php echo $member[0]->address; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="mb-2">Saldo</h2>
                <h4>Rp. <?php echo number_format($member[0]->saldo); ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add-saving">Tambah Simpanan</button>
                &nbsp;&nbsp;&nbsp;
                <?php if($savings) { ?>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-take-saving">Ambil Simpanan</button>
                <?php } ?>
            </div>
        </div><br>

        <!-- Start Modal Add -->
        <div class="modal fade" id="modal-add-saving">
            <div class="modal-dialog">
                <?php echo form_open($pageCurrent.'/addMemberSaving');?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah Simpanan</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="amount">Jumlah (Rp.)</label>
                                    <input type="text" class="form-control" id="number" name="amount" placeholder="Masukkan Jumlah (Rp.)" required>
                                    <input type="hidden" name="member_id" value="<?php echo $member[0]->uid; ?>">
                                    <input type="hidden" name="id" value="<?php echo $member[0]->id; ?>">
                                    <input type="hidden" name="saving_id" value="<?php echo $member[0]->saving_id; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- End Modal Add -->

        <!-- Start Modal Take -->
        <div class="modal fade" id="modal-take-saving">
            <div class="modal-dialog">
                <?php echo form_open($pageCurrent.'/takeMemberSaving');?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ambil Simpanan</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="amount">Jumlah (Rp.)</label>
                                    <input type="text" class="form-control" id="number" name="amount" placeholder="Masukkan Jumlah (Rp.)" required>
                                    <input type="hidden" name="member_id" value="<?php echo $member[0]->uid; ?>">
                                    <input type="hidden" name="id" value="<?php echo $member[0]->id; ?>">
                                    <input type="hidden" name="saving_id" value="<?php echo $member[0]->saving_id; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Ambil</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- End Modal Take -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $pageTitleSub; ?></h3>
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
                                    <th>Tanggal</th>
									<th>Jumlah</th>
                                    <th>Jenis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  ?>
                                <?php if($savings) { $no = 1; foreach ($savings as $saving) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $saving->time; ?></td>
                                        <td>Rp. <?php echo number_format($saving->amount); ?></td>
                                        <td>
											<span class="label label-<?php echo $types[$saving->type]['label']; ?>"><?php echo $types[$saving->type]['name']; ?></span>
                                        </td>
                                    </tr>
                                <?php $no++; }} else { ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ditemukan Data</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <a href="javascript:window.history.go(-1);" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
