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
                                    <th>Status</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($loans) { $no = 1; foreach ($loans as $loan) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $loan->time; ?></td>
                                        <td>Rp. <?php echo number_format($loan->debt); ?></td>
                                        <td><?php echo $loan->interest; ?> %</td>
                                        <td>Rp. <?php echo number_format($loan->debt_total); ?></td>
                                        <td>Rp. <?php echo number_format($loan->debt_paid); ?></td>
                                        <td>Rp. <?php echo number_format($loan->debt_total - $loan->debt_paid); ?></td>
                                        <td>
											<span class="label label-<?php echo $statuses[$loan->status]['label']; ?>"><?php echo $statuses[$loan->status]['name']; ?></span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm btn-info-modal" data-id="<?php echo $loan->id; ?>" data-role="member">Info</button>
                                        </td>
                                    </tr>
                                <?php $no++; }} else { ?>
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak Ditemukan Data</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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

    </section>
</div>
