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

<div class="modal-body">
                <!-- Title -->
        <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu Title">
        </div>
                <!-- Menu ID -->
        <div class="form-group">
            <select class="form-control" name="menu_id" id="menu_id">        
                <option>---SELECT---</option>
                    <?php foreach($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>
                <!-- Menu URL -->
        <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu URL">
        </div>
                <!-- Menu Icon -->
        <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu Icon">
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                <label class="form-check-label" for="is_active">Active?</label>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
</div>

        

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->

      <!-- MODAL BOX ADD-->

<div class="modal fade" id="SubMenuModal" tabindex="-1" role="dialog" aria-labelledby="SubMenuModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    
</div>
</div>
