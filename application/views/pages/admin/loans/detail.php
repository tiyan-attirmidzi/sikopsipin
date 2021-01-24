<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $pageTitle; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="<?php echo base_url($pageCurrent) ?>"><?php echo $pageContent; ?></a></li>
            <li class="active"><?= "Detail" ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <h2><?php echo $member[0]->uid; ?></h2>
                <div>
                    <h4><strong><?php echo $member[0]->name; ?></strong></h4>
                    <p><?php echo $member[0]->address; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <h2><?php echo $member[0]->username; ?></h2>
                <h4><?php echo $member[0]->email; ?></h4>
                <p><?php echo $member[0]->phone; ?></p>
            </div>
            <div class="col-md-4">
                <h2>Hutang</h2>
                <h4>Rp. <?php echo number_format($debt); ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add-loan">Tambah Pinjaman</button>
            </div>
        </div><br>

        <!-- Start Modal Add -->
        <div class="modal fade" id="modal-add-loan">
            <div class="modal-dialog">
                <?php echo form_open($pageCurrent.'/addMemberLoan');?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah Pinjaman</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="amount">Jumlah (Rp.)</label>
                                    <input type="text" class="form-control" id="rupiah1" name="amount" placeholder="Masukkan Jumlah (Rp.)" required>
                                    <input type="hidden" name="member_id" value="<?php echo $member[0]->uid; ?>">
                                    <input type="hidden" name="id" value="<?php echo $member[0]->id; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="interest">Bunga (%)</label>
                                    <input type="number" class="form-control" id="interest" name="interest" placeholder="Masukkan Bunga (%)" min="1" max="100" value="1" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="amount_month">Jumlah Bulan</label>
                                    <input type="number" class="form-control" id="amount_month" name="amount_month" placeholder="Masukkan Masukkan Jumlah Bulan" min="1" max="100" required>
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
									<th>Jumlah Pinjaman</th>
									<th>Bunga (%)</th>
									<th>Total Pembayaran</th>
									<th>Terbayar</th>
									<th>Sisa</th>
									<th>Jumlah Bulan</th>
                                    <th>Status</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($loans) { $no = 1; foreach ($loans as $loan) { ?>
                                    <tr id="<?php echo $loan->id; ?>">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $loan->time; ?></td>
                                        <td>Rp. <?php echo number_format($loan->debt); ?></td>
                                        <td><?php echo $loan->interest; ?> %</td>
                                        <td>Rp. <?php echo number_format($loan->debt_total); ?></td>
                                        <td>Rp. <?php echo number_format($loan->debt_paid); ?></td>
                                        <td>Rp. <?php echo number_format($loan->debt_total - $loan->debt_paid); ?></td>
                                        <td><?php echo $loan->amount_month; ?></td>
                                        <td>
											<span class="label label-<?php echo $statuses[$loan->status]['label']; ?>"><?php echo $statuses[$loan->status]['name']; ?></span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm btn-info-modal" data-id="<?php echo $loan->id; ?>" data-role="admin">Info</button>
                                            <?php if ($loan->status == 0) { ?>
                                                <button type="button" class="btn btn-warning btn-sm btn-pay-modal" data-id="<?php echo $loan->id; ?>">Bayar</button>
                                            <?php } ?>
                                            <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                                        </td>
                                    </tr>
                                <?php $no++; }} else { ?>
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak Ditemukan Data</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo base_url($pageCurrent); ?>" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Modal Info -->
        <div class="modal fade" id="info-modals">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Info Angsuran</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <table id="data-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody id="loan_detail">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Info -->

        <!-- Start Modal Pay -->
        <div class="modal fade" id="pay-modals">
            <div class="modal-dialog">
                <form id="form-pay" method="post" accept-charset="utf-8">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Bayar Pinjaman</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="amount">Jumlah (Rp.)</label>
                                    <input type="text" class="form-control" id="rupiah2" name="amount" placeholder="Masukkan Jumlah (Rp.)" required>
                                    <input type="hidden" name="member_id" value="<?php echo $member[0]->uid; ?>">
                                    <input type="hidden" name="id" value="<?php echo $member[0]->id; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Bayar</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- End Modal Pay -->

    </section>
</div>
