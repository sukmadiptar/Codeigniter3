

 
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <form action="" method="post">

            <div class="modal-body">
                            <!-- intCode -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="intcode" name="intcode" placeholder="intcode">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="caCode" name="caCode" placeholder="CA Code">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subcaCode" name="subcaCode" placeholder="Sub CA Code">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prodCode" name="prodCode" placeholder="Prod Code">
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
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked="">
                            <label class="form-check-label" for="is_active">Active?</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
            </div>
            

        </form>
              
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      