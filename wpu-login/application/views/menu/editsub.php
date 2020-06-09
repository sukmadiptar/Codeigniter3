        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


            <form action="" method="post" class="col-7">
            <input type="hidden" name="id" value="<?= $subbMenu['id'];?>">
            
                <div class="modal-body">
                        
                        <!-- Title -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu Title" value="<?= $subbMenu['title']; ?>">
                        </div>
                        <!-- Menu ID -->
                        <div class="form-group">

<select class="form-control" name="menu" id="menu">  
    <?php foreach($menuid as $mi) : ?>                   
        <?php if ( $mi == $subbMenu['menu_id'] ) : ?>
            <option selected value="<?= $mi; ?>"><?= $mi; ?></option>
        <?php else : ?>
            <option value="<?= $mi; ?>"><?= $mi; ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>
                            
                        </div>
                        <!-- Menu URL -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu URL" value="<?= $subbMenu['url']; ?>">
                        </div>
                        <!-- Menu Icon -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu Icon" value="<?= $subbMenu['icon']; ?>">
                        </div>
                        <!-- is_active -->
                        <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">Active?</label>
                                </div>
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" value="Return to previous page" onClick="javascript:history.go(-1)">Close</button>
                            <button type="submit" class="btn btn-primary" name="editsub">Edit</button>
                        </div>
                </div>


            </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      



