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
                <div>
                    <h4><strong><?php echo $member[0]->name; ?></strong></h4>
                    <p><?php echo $member[0]->address; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Saldo</h2>
                <h4>Rp. <?php echo number_format($member[0]->saldo); ?></h4>
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
									<th>Jumlah</th>
                                    <th>Jenis</th>
                                    <th>Tipe Simpanan</th>
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
                                        <td>
											<span class="label label-<?php echo $kinds[$saving->kind]['label']; ?>"><?php echo $kinds[$saving->kind]['name']; ?></span>
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
                </div>
            </div>
        </div>

    </section>
</div>
