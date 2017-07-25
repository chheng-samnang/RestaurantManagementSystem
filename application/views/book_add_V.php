
</nav>
	<div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                <div class="container-fluid">
                    <div class="row" style="margin-top:20px;">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h4><i class="fa fa-book"></i> Book Management</h4></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-5">
                                            <!--error-->
                                                <?php if(validation_errors() OR isset($error)){?>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      <strong>Warning!</strong> <?php if(validation_errors()){echo validation_errors();}if(isset($error)){echo $error->tab_id;}?>
                                                    </div>
                                                <?php }?>
                                            <!--end error-->
                                            </div>
                                        </div>
                                    <?php echo form_open('index.php/bookController/validation_add');?>                                                                                                                      
                                       <div class="row">
                                           <div class="col-lg-5">
                                               <label class="control-label">Customer name</label>
                                               <input type="text" name="txtCustomerName" class="form-control" value="<?php echo set_value('txtCustomerName')?>" placeholder="Customer name">
                                           </div>                                           
                                       </div><!--end row-->
                                       <div class="row">                                           
                                           <div class="col-lg-5">
                                               <label class="control-label">Phone</label>
                                               <input type="text" name="txtPhone" class="form-control" placeholder="Phone"  value="<?php echo set_value('txtPhone')?>">
                                           </div>                                           
                                       </div><!--end row-->                                       
                                       <div class="row">                                           
                                           <div class="col-lg-5">
                                               <label class="control-label">People Amount</label>
                                               <input type="number" name="txtPeople" class="form-control" placeholder="People Amount"  value="<?php echo set_value('txtPeople')?>">
                                           </div>                                           
                                       </div><!--end row-->
                                       <div class="row">                                           
                                           <div class="col-lg-5">
                                               <label class="control-label">Time book</label>
                                               <input type="text" placeholder="Time Book" name="txtTime" class="form-control"  value="<?php echo set_value('txtTime')?>">
                                               <p class="help-block">__:__:__ Ex: 13:15:00</p>
                                           </div>                                           
                                       </div><!--end row-->
                                       <div class="row">
                                          <div class="col-lg-5">
                                              <div class="form-group">
                                                  <label class="control-label">Description</label>
                                                  <textarea class="form-control" name="tarearDesc"  value="<?php echo set_value('tarearDesc')?>"></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <input type="hidden" name="txtTabID" value="<?php if(isset($id)) echo $id;?>">                                      
                                       <div class="row" style="margin-top:1%">
                                           <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary" name="btnSave"><i class="fa fa-save"></i> Save</button>                                                
                                                <a href="<?php echo base_url('index.php/POS_C/index');?>" class="btn btn-default"><i class="fa fa-close"></i> Close</a>
                                           </div>
                                       </div>
                                       <?php form_close()?>                                
                                    </div><!--panel-body -->
                                </div>            
                            </div><!--end col-->                    
                        </div><!--end row-->                              
                                        
                    <!--error-->
                    <div class="row">
                        
                        
                    </div><!--end row2-->             

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div><!--end col-->
        </div><!--end row-->
</div>