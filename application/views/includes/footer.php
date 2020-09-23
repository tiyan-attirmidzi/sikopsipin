        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.1
            </div>
            <strong>Copyright &copy; 2020 <a href="#">SIPENUS</a></strong> All rights reserved.
        </footer>

        <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dashboard/dist/js/adminlte.min.js"></script>
	<!-- End Javascript Resource -->
	
	<!-- Sweet Alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
        if($this->session->flashdata('alertSweet')) {
            echo $this->session->flashdata('alertSweet');
        }
    ?>

    <?php if ($jsConfirmDelete != '') { ?>
        <script>
            $(document).ready(function(){
                $('.btn-delete').click(function(e){
                    e.preventDefault();
                    var id = $(this).parents("tr").attr("id");
                    swal({
                        title: 'Anda yakin menghapus?',
                        text: 'Data ini akan dihapus secara permanen',
                        icon: 'warning',
                        buttons: ["Batal", "Ya"],
                    }).then(function (e) {
                        $.ajax({
                            type: "DELETE",
                            url: "<?php echo base_url($pageCurrent."/delete/"); ?>" + id,
                            data: {id:id},
                            success: function (data) {
                                location.reload();
                            },
                            error: function (e) {
                                // console.log(e);
                            }
                        });
                    });
                });
            });
        </script>
    <?php } ?>
	
	<script>
		// swal("Cancelled", "Your imaginary file is safe :)", "error");
	</script>


    <?php if ($jsConfirmDelete != '') { ?>
        <script>
            $(document).ready(function () {
                $('#data-table').DataTable({
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : true
                })
            })
        </script>
    <?php } ?>
    
</body>
</html>
