        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading --> 
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                <form action="" method="post">
                <input type="hidden" name="id" value="<?= $role['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" value="<?= $role['role']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" value="Return to previous page" onClick="javascript:history.go(-1)">Back</button>
                            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                        </div>
                    </div> 
                </form>  
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      