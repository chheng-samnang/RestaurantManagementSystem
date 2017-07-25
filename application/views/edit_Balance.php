    <!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
            <h1 class="page-header"><i class="glyphicon glyphicon-duplicate"></i> Edit Balane</h1>
            <?php echo form_open('index.php/Balance/update/'.$record->bal_id)?>
    <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">Edit Balance Info</div>
            <div class="panel-body">
               
                  <?php if(form_error('txt_open_balance_us')){?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Warning!</strong> <?php echo form_error('txt_open_balance_us');?>
                    </div>
                  <?php }?>
                  <div class="row">
                      <div class="col-lg-4">
                          <label> Open Balance (US)</label>
                          <input type="text" name="txt_open_balance_us" class="form-control" value="<?php if(isset($record->open_bal_usd))echo $record->open_bal_usd.'$';?>">
                      </div><!-- /. col-lg-4 -->
                      <div class="col-lg-4">
                          <label> Open Balance (R)</label>
                          <input type="text" name="txt_open_balance_r" class="form-control" value="<?php if(isset($record->open_bal_riel))echo $record->open_bal_riel.'R';?>">
                      </div><!-- /. col-lg-4 -->
                  </div><!--/. row -->
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-4">
                        <button type="submit" name="btn_addposition" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save Change</button>
                        <button type="submit" name="btn_addposition" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
                    </div><!-- /. col-lg-4 -->
                </div>
            </div><!-- /. panel-body -->
          </div><!--/.panel panel-default -->
      </div><!-- /.col-lg-12 -->
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->

        