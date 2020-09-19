 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $pageTitle; ?> 
        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo base_url($pageCurrent) ?>"><i class="fa fa-dashboard"></i> <?php echo $pageContent; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<ul class="timeline">
					<!-- Start Timeline Proposal -->
					<li>
						<i class="fa fa-envelope bg-blue"></i>
						<div class="timeline-item">
							<span class="time"><i class="fa fa-clock-o"></i> <?php echo $schedule[0]->upload_at ? $schedule[0]->upload_at : " "; ?></span>
							<h3 class="timeline-header"><a href="javascript:void(0)">Ujian Proposal</a> Tugas Akhir</h3>
							<div class="timeline-body">
								Melakukan pengajuan jadwal Ujian Proposal.
							</div>
							<div class="timeline-footer">
								<a href="<?php echo base_url("mahasiswa/schedules/submission/1");?>" class="btn btn-primary" <?php echo $schedule[0]->upload_at ? "disabled" : ""; ?>>Mengajukan Jadwal</a>
							</div>
						</div>
					</li>
					<?php if ($schedule[0]->upload_at) { ?>
						<li class="time-label">
							<span class="bg-red">
								<?php echo $schedule[0]->status == 1 ? $schedule[0]->time." | ".$schedule[0]->room : "Menunggu Jadwal"; ?>
							</span>
						</li>
					<?php } ?>
					<!-- End Timeline Proposal -->
					<!-- Start Timeline Result -->
					<?php if ($schedule[1]) { ?>
						<li>
							<i class="fa fa-file-text bg-yellow"></i>
							<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i> <?php echo $schedule[1]->upload_at ? $schedule[1]->upload_at : $schedule[1]->upload_at; ?></span>
								<h3 class="timeline-header no-border"><a href="javascript:void(0)">Ujian Hasil</a> Tugas Akhir</h3>
								<div class="timeline-body">
									Melakukan pengajuan jadwal Ujian Hasil.
								</div>
								<div class="timeline-footer">
									<a href="<?php echo base_url("mahasiswa/schedules/submission/2");?>" class="btn bg-yellow" <?php echo $schedule[1]->status == 1 ? "disabled" : ""; ?>>Mengajukan Jadwal</a>
								</div>
							</div>
						</li>
						<?php if ($schedule[1]->time) { ?>
							<li class="time-label">
								<span class="bg-green">
									<?php echo $schedule[1]->status == 1 ? $schedule[1]->time." | ".$schedule[1]->room : "Menunggu Jadwal"; ?>
								</span>
							</li>
						<?php }?>
					<?php } ?>
					<!-- End Timeline Result -->
					<!-- Start Timeline Closed -->
					<?php if ($schedule[2]) { ?>
						<li>
							<i class="fa fa-book bg-aqua"></i>
							<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i> <?php echo $schedule[2]->upload_at ? $schedule[2]->upload_at : $schedule[2]->upload_at; ?></span>
								<h3 class="timeline-header"><a href="javascript:void(0)	">Ujian Skripsi</a> Tugas Akhir</h3>
								<div class="timeline-body">
									Melakukan pengajuan jadwal Ujian Skripsi.
								</div>
								<div class="timeline-footer">
									<a href="<?php echo base_url("mahasiswa/schedules/submission");?>" class="btn bg-aqua" <?php echo $schedule[2]->upload_at ? "disabled" : ""; ?>>Mengajukan Jadwal</a>
								</div>
							</div>
						</li>
						<?php if ($schedule[2]->upload_at) { ?>
							<li class="time-label">
								<span class="bg-green">
									<?php echo $schedule[2]->status == 1 ? $schedule[2]->time." | ".$schedule[2]->room : "Menunggu Jadwal"; ?>
								</span>
							</li>
						<?php }?>
					<?php } ?>
					<!-- End Timeline Closed -->
					<li>
						<i class="fa fa-clock-o bg-gray"></i>
					</li>
				</ul>
            </div>
        </div>
    </section>

 </div>
