        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.1
            </div>
            <strong>Copyright &copy; 2020 <a href="#">SIKOPSIPIN</a></strong> All rights reserved.
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

    <?php if ($this->uri->segment(3) == 'member' || ($this->uri->segment(1) == 'member' && $this->uri->segment(2) == 'loans')) { ?>
        <script>

            $(document).ready(function() {
                $('.btn-info-modal').click(function(e) {
                    e.preventDefault();
                    id = $(this).data('id');
                    role = $(this).data('role');
                    url = role + '/loans/show/';
                    $('#info-modals').modal({
                        backdrop: 'static',
                        show: true
                    });
                    $.ajax({
                        url: "<?php echo base_url(); ?>"+ url + id,
                        type: "GET",
                        dataType : "JSON",
                        success: function(data) {
                            // console.log(data);
                            let html = '';
                            let no = 1;
                            for(let i=0; i < data.length; i++){
                                html += '<tr>'+
                                    '<td>'+ no +'</td>'+
                                    '<td>'+ data[i].time +'</td>'+
                                    '<td>'+ formatRupiah(data[i].amount, "Rp. ") +'</td>'+
                                '</tr>';
                                no++;
                            }
                            $('#loan_detail').html(html);
                        },
                        error: function(msg) {
                            console.log("error : " + msg)
                        }
                    });
                });
                $('.btn-pay-modal').click(function(e) {
                    e.preventDefault();
                    idLoan = $(this).data('id');
                    $('#pay-modals').modal({
                        backdrop: 'static',
                        show: true
                    });
                    $('#form-pay').attr('action', '<?php echo base_url('admin/loans/payMemberLoan/'); ?>' + idLoan);
                });
            });

            let rupiah1 = document.getElementById("rupiah1");
            let rupiah2 = document.getElementById("rupiah2");

            rupiah1.addEventListener("keyup", function(e) {
                rupiah1.value = formatRupiah(this.value, "Rp. ");
            });
            rupiah2.addEventListener("keyup", function(e) {
                rupiah2.value = formatRupiah(this.value, "Rp. ");
            });

            function formatRupiah(angka, prefix) {
                let number_string = angka.replace(/[^,\d]/g, "").toString(),
                    split = number_string.split(","),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? "." : "";
                    rupiah += separator + ribuan.join(".");
                }

                rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
            }
        </script>
    <?php } ?>
    
    <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'savings' && $this->uri->segment(3) == '') { ?>
        <script>
            function setInputFilter(textbox, inputFilter) {
                ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
                    textbox.addEventListener(event, function() {
                        if (inputFilter(this.value)) {
                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                        } else if (this.hasOwnProperty("oldValue")) {
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        } else {
                            this.value = "";
                        }
                    });
                });
            }

            setInputFilter(document.getElementById("number"), function(value) {
                return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 99999999999999); 
            });

            setInputFilter(document.getElementById("interest"), function(value) {
                return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 100); 
            });

        </script>
    <?php } ?>
    <?php if ($this->uri->segment(2) == 'members' || $this->uri->segment(2) == 'savings' || $this->uri->segment(2) == 'loans') { ?>
        <script>
            $(document).ready(function(){
                $('.btn-delete').click(function(e){
                    // e.preventDefault();
                    let id = $(this).parents("tr").attr("id");
                    swal({
                        title: 'Anda yakin menghapus?',
                        text: 'Data ini akan dihapus secara permanen',
                        icon: 'warning',
                        buttons: ["Batal", "Ya"],
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "<?php echo base_url($pageCurrent."/delete/"); ?>" + id,
                                success: function (data) {
                                    location.reload();
                                },
                                error: function (e) {
                                    console.log(e);
                                }
                            });
                        }
                    });
                });
                $('.btn-confirm').click(function(e){
                    // e.preventDefault();
                    let id = $(this).parents("tr").attr("id");
                    swal({
                        title: 'Anda akan mengaktifkan?',
                        text: 'Akun ini akan diaktifkan',
                        icon: 'warning',
                        buttons: ["Batal", "Ya"],
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "<?php echo base_url($pageCurrent."/confirm/"); ?>" + id,
                                success: function (data) {
                                    location.reload();
                                },
                                error: function (e) {
                                    console.log(e);
                                }
                            });
                        }
                    });
                });
            });
        </script>
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
