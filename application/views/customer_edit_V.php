	
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user"></i> Customer</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="col-lg-12"><!--table-->                
                    <div class="panel panel-default"><!--panel-->
                        <div class="panel-heading">Customer Edit</div>
                        <div class="panel-body">
                            <?php echo form_open('index.php/customer_C/change/'.$record->cus_id)?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!--error-->
                                        <?php if(form_error('txtCustomerName')){?>
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong>Warning!</strong> <?php echo form_error('txtCustomerName');?>
                                            </div>
                                        <?php }?>
                                        <!--end error-->
                                    </div>
                                </div>                                                            
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Customer name</label>
                                            <input type="text" name="txtCustomerName" id="txtCustomerName" class="form-control" placeholder="Customer name" value="<?php if(isset($record->cus_name)) echo $record->cus_name;?>">
                                        </div>    
                                    </div>
                                </div>                               
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label">Discount</label>
                                        <div class="input-group">
                                            <input type="text" name="txtDiscount" id="txtDiscount" class="form-control" placeholder="Discont" value="<?php if(isset($record->discount)) echo $record->discount;?>">
                                            <span class="input-group-addon" id="txtDiscount">%</span>
                                        </div>
                                    </div>
                                </div><!--end row1-->
                                <br>
                                 <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea class="form-control" name="tarearDesc" placeholder="Description"><?php if(isset($record->desc)) echo $record->desc;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                         <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="btnSaveChange"><i class="fa fa-save"></i> Save Change</button>                                            
                                            <a href="<?php echo base_url('index.php/customer_C');?>" class="btn btn-default"><i class="fa fa-close"></i> Close</a>
                                        </div>  
                                    </div>
                                </div><!--end row2-->                                                                                                                                 
                            </form>
                        </div>
                    </div><!--end panel-->    
                </div><!--end table -->

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    