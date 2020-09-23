        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
	<script src="<?php echo base_url(); ?>assets/dashboard/plugins/iCheck/icheck.min.js"></script>
    <!-- Sweet Alert -->
    <!-- Javascript -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
        if($this->session->flashdata('alertSweet')) {
            echo $this->session->flashdata('alertSweet');
        }
    ?>
	
</body>
</html>
