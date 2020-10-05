<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Navbar Management</h1>

    <div class="row">
        <div class="col-lg">

        <!-- <?php //if (validation_errors() ) : ?>
            <div class="alert alert-danger" role="alert">
                <?php //validation_errors(); ?>
            </div>
        <?php //endif; ?> -->


        <?= $this->session->flashdata('message'); ?>
                
        <?= $this->session->flashdata('message_del'); ?>

        <?= $this->session->flashdata('message_delsub'); ?>

        <?= $this->session->flashdata('message_editsub'); ?>

<form action="<?php base_url('menu/submenu'); ?>" method="post">

</form>


        

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->

