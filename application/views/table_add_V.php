        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-wheelchair"></i> Table</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="col-lg-12"><!--table-->                
                    <div class="panel panel-default"><!--panel-->
                        <div class="panel-heading">Table add</div>
                        <div class="panel-body">
                            <?php echo form_open('index.php/table_C/validation_add')?>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <!--error-->
                                        <?php if(validation_errors()){?>
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong>Warning!</strong>
                                              <div><?=validation_errors();?></div>
                                            </div>
                                        <?php }?>
                                        <!--end error-->
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Table name</label>
                                            <input type="text" name="txtTableName" id="txtTableName" class="form-control" placeholder="Table name" value="<?= set_value('txtTableName');?>">
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Seat</label>
                                           <input type="text" name="txtSeats" id="txtSeats" class="form-control" placeholder="Seats" value="<?= set_value('txtSeats');?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                    <label class="control-label">Price</label>
                                        <div class="input-group">                                            
                                            <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value="<?= set_value('txtPrice');?>">
                                            <span class="input-group-addon" id="txtDiscount">$</span>
                                        </div>
                                    </div>
                                </div><!--end row1-->
                                <br>
                                <div class="row">
                                    <div class="col-lg-4">Status:
                                        <label class="radio-inline">
                                            <input type="radio" name="radSta" id="radSta" value="Free" checked="checked"> Free
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radSta" id="radSta" value="Waiting"> Waiting
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radSta" id="radSta" value="Busy"> Busy
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                         <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="btnSave"><i class="fa fa-save"></i> Save</button>
                                            <button type="submit" class="btn btn-primary" name="btnSaveNew"><i class="fa fa-star"></i> Save New</button>
                                            <a href="<?php echo base_url('index.php/table_C');?>" class="btn btn-default"><i class="fa fa-close"></i> Close</a>
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

    