<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user"></i> <?php echo $this->lang->line('change_password')?></h1>
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
            <?php echo form_open('userController/change_password/'.$query->user_id)?>    
                <div class="row">
                  <div class="col-md-12"><!--table-->
                      <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->lang->line('change_password')?></h3>
              </div>
              <div class="panel-body">
                <div class="row">
                	<div class="col-lg-3">
                		<div class="form-group">
                			<label>New Password</label>
                			<?php echo form_password('txtNewPassword','','class="form-control" placeholder="Enter New Password here..."')?>
                		</div>
                	</div>
                	<div class="col-lg-3">
                		<div class="form-group">
                			<label>Confirm New Password</label>
                			<?php echo form_password('txtConfirm','','class="form-control" placeholder="Enter New Password here..."')?>
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