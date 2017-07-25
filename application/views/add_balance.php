
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header"><i class="glyphicon glyphicon-duplicate"></i> Add Balance</h1>
            <?php echo form_open('index.php/Balance/insert_balance')?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add Balance Info</div>
                          <div class="panel-body">
                          <?php if(form_error('txt_open_balance_us')){?>
                                  <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning!</strong> <?php echo form_error('txt_open_balance_us');?>
                                  </div>
                              <?php }?>
                             <div class="row">
                              <div class="col-lg-4">
                                <label> Staff Name </label>
                                <select class="form-control" name="txtstaff_name"> 
                                  <option readonly >-- select staff --</option>
                                  <?php foreach($record as $staff) { ?>
                                    <option value="<?php echo $staff['user_code']?>"><?php echo $staff['staff_name']?></option>
                                  <?php } ?>
                                </select>
                              </div><!-- /. col-lg-4 -->
                              <div class="col-lg-4">
                                <label> Open Balance (US)</label>
                                <input type="text" value="0" name="txt_open_balance_us" class="form-control" placeholder="Open Balance (US)" >
                              </div><!-- /. col-lg-4 -->
                              <div class="col-lg-4">
                                <label> Open Balance (R)</label>
                                <input type="text" name="txt_open_balance_r" value="0" class="form-control" placeholder="Open Balance (R)">
                              </div><!-- /. col-lg-4 -->
                            </div><!--/. row -->
                            <div class="row" style="margin-top: 20px;">
                               <div class="col-lg-8">
                                <button type="submit" name="btn_Saveclose" class="btn btn-primary">
                                    <i class="fa fa-floppy-o"></i> Save Close</button>
                                    <button type="submit" name="btn_Savenew" class="btn btn-primary">
                                    <i class="fa fa-floppy-o"></i> Save New </button>
                                
                                    <a href="<?php echo base_url('index.php/Balance');?>" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
                              </div><!-- /. col-lg-8 -->

                            </div>
                          </div><!-- /. panel-body -->
                        </div><!--/.panel panel-default -->
                    </div><!-- /.col-lg-12 -->
            
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->

        