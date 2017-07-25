<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <?php echo form_open('index.php/userController/get_user_edit/'.$query->user_id);?>
    
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user"></i> <?php echo $this->lang->line('edit')?> <?php echo $this->lang->line('user')?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <?php if(null!=validation_errors()){?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> <?php echo validation_errors();?>
              </div>
            <?php }?> 
                  </div>                  
                </div>
                
                <div class="row">
                  <div class="col-md-12"><!--table-->
                      <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->lang->line('user')?></h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>User Code</label>
                      <input type="text" name="txtUsercode" value="<?php echo $query->userCode?>" class="form-control" placeholder="Enter User Code here...">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" value="<?php echo $query->userName?>" class="form-control" name="txtUsername" placeholder="Enter Username here...">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Status</label>
                      <?php echo form_dropdown('ddlStatus',$status,$query->status,'class="form-control"')?>                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Description</label>
                      <?php echo form_textarea('txtDesc',$query->des,'class="form-control" placeholder="Enter your description here..."')?>
                    </div>
                  </div>                  
                </div>

                <div class="row">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $this->lang->line('edit')?></button>
                      <a href="<?php echo base_url('index.php/userController/index');?>" class="btn btn-default"><i class="fa fa-close"></i> <?php echo $this->lang->line('cancel')?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                  </div>  
                </div>
                


                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    </form>


    

